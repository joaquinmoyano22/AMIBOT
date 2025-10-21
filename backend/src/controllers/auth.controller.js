import { z } from 'zod';
import { registerUser, loginUser } from '../services/auth.service.js';

const registerSchema = z.object({
  email: z.email(),
  password: z.string().min(8),
});

const loginSchema = z.object({
  email: z.email(),
  password: z.string().min(1),
});

export const AuthController = {
  registerSchema,
  loginSchema,

  async register(req, res, next) {
    try {
      const { email, password } = req.data;
      const { id } = await registerUser({ email, password });
      return res.status(201).json({ id });
    } catch (err) {
      return next(err);
    }
  },

  async login(req, res, next) {
    try {
      const { email, password } = req.data;
      const result = await loginUser({ email, password });
      if (!result) {
        return res.status(401).json({ error: 'INVALID_CREDENTIALS' });
      }
      return res.json(result);
    } catch (err) {
      return next(err);
    }
  },
};
