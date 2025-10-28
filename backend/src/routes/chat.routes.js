import { Router } from 'express';
import multer from 'multer';
import os from 'node:os';
import { validate } from '../middlewares/validate.js';
import { ChatController, ChatSchemas } from '../controllers/chat.controller.js';

const router = Router();

const upload = multer({
  storage: multer.diskStorage({
    destination: (req, file, cb) => cb(null, os.tmpdir()),
    filename: (req, file, cb) => cb(null, `${Date.now()}-${file.originalname}`),
  }),
  fileFilter: (req, file, cb) => {
    if (file.mimetype === 'application/pdf') return cb(null, true);
    cb(new Error('Solo se permiten archivos PDF'));
  },
  limits: {
    fileSize: 25 * 1024 * 1024,
  },
});

router.post('/chat', validate(ChatSchemas.chatBody), ChatController.chat);
router.get('/chat/stream', ChatController.stream);

router.get(
  '/files',
  validate(ChatSchemas.filesQuery, 'query'),
  ChatController.listFiles
);

router.post(
  '/files/upload',
  upload.single('file'),
  validate(ChatSchemas.uploadBody),
  ChatController.upload
);

export default router;
