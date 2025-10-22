import express from 'express';
import morgan from 'morgan';
import cors from 'cors';
import dotenv from 'dotenv';
import authRoutes from './routes/auth.routes.js';
import { errorHandler } from './middlewares/errorHandler.js';

dotenv.config();

const app = express();

app.use(cors());

app.options('*', cors());

app.use(express.json());
app.use(morgan('dev'));

app.use('/api/auth', authRoutes);

app.use(errorHandler);

export default app;
