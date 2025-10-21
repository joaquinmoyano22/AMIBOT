import { Router } from 'express';
import { AuthController } from '../controllers/auth.controller.js';
import { validate } from '../middlewares/validate.js';

const router = Router();

router.post(
  '/register',
  validate(AuthController.registerSchema),
  AuthController.register
);

router.post(
  '/login',
  validate(AuthController.loginSchema),
  AuthController.login
);

export default router;
