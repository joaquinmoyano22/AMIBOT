import { z } from 'zod';
import { registerUser, loginUser } from '../services/auth.service.js';

const registerSchema = z.object({
  name: z.string().min(1, 'El nombre es obligatorio'),
  email: z.email('Correo inválido'),
  password: z.string().min(8, 'La contraseña debe tener al menos 8 caracteres'),
  is_admin: z.boolean().optional().default(false),
});

const loginSchema = z.object({
  email: z.email(),
  password: z.string().min(1, 'Contraseña obligatoria'),
});

export const AuthController = {
  registerSchema,
  loginSchema,

  async register(req, res, next) {
    try {
      const { name, email, password, is_admin } = req.data;
      const { id } = await registerUser({ name, email, password, is_admin });
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
