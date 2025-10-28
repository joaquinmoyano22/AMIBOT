import { z } from 'zod';
import fs from 'node:fs';
import fsp from 'node:fs/promises';
import path from 'node:path';
import {
  askOnce,
  askStream,
  listFilesByMateria,
  uploadFileToGemini,
} from '../services/gemini.service.js';

const FILE_ROOT = process.env.FILE_ROOT || '/srv/amibot/materials';

function slug(str) {
  return (str || '')
    .normalize('NFKD')
    .replace(/[\u0300-\u036f]/g, '')
    .replace(/[^a-zA-Z0-9._-]+/g, '-')
    .replace(/-+/g, '-')
    .replace(/^[-.]+|[-.]+$/g, '')
    .toLowerCase();
}

export const ChatSchemas = {
  chatBody: z.object({
    materia: z.string().min(1),
    message: z.string().min(1),
    conversationId: z.string().optional(),
  }),
  filesQuery: z.object({
    materia: z.string().min(1),
  }),
  uploadBody: z.object({
    materia: z.string().min(1),
  }),
};

export const ChatController = {
  async chat(req, res, next) {
    try {
      const { materia, message, conversationId } = req.data;
      const text = await askOnce({ materia, message, conversationId });
      return res.json({ text });
    } catch (err) {
      return next(err);
    }
  },

  async stream(req, res, next) {
    try {
      const materia = req.query.materia;
      const message = req.query.message;
      const conversationId = req.query.conversationId;
      if (!materia || !message) {
        res.status(400).end('materia y message son requeridos');
        return;
      }

      res.setHeader('Content-Type', 'text/event-stream');
      res.setHeader('Cache-Control', 'no-cache, no-transform');
      res.setHeader('Connection', 'keep-alive');

      const encode = (txt) => `data: ${JSON.stringify({ text: txt })}\n\n`;

      for await (const chunk of askStream({
        materia,
        message,
        conversationId,
      })) {
        res.write(encode(chunk));
      }
      res.write('data: [DONE]\n\n');
      res.end();
    } catch (err) {
      try {
        res.write(`data: ${JSON.stringify({ error: 'stream_error' })}\n\n`);
      } catch {}
      res.end();
      return next(err);
    }
  },

  async listFiles(req, res, next) {
    try {
      const { materia } = req.data;
      const files = await listFilesByMateria(materia);
      return res.json({ files });
    } catch (err) {
      return next(err);
    }
  },

  async upload(req, res, next) {
    try {
      const { materia } = req.data;
      if (!req.file) return res.status(400).json({ error: 'file requerido' });

      const safeMateria = slug(materia);
      const original = req.file.originalname || 'archivo.pdf';
      const ext = path.extname(original) || '.pdf';
      const base = slug(path.basename(original, ext)) || 'archivo';
      const stamped = `${base}-${Date.now()}${ext}`;

      const targetDir = path.join(FILE_ROOT, safeMateria);
      const targetPath = path.join(targetDir, stamped);

      await fsp.mkdir(targetDir, { recursive: true });

      await fsp.copyFile(req.file.path, targetPath);

      const uploaded = await uploadFileToGemini({
        absPath: targetPath,
        nombre: original,
        materia,
        mimeType: req.file.mimetype || 'application/pdf',
      });

      try {
        await fsp.unlink(req.file.path);
      } catch {}

      return res.json({
        file: {
          localPath: targetPath,
          materia: safeMateria,
          originalName: original,
          storedName: stamped,
        },
        gemini: uploaded,
      });
    } catch (err) {
      return next(err);
    }
  },
};
