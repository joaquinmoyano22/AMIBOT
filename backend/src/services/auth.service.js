import { pool } from '../db/index.js';
import { hashPassword, comparePassword } from '../utils/password.js';

function toBool(v) {
  return v === true || v === 'true' || v === 1 || v === '1';
}

export async function registerUser({ name, email, password, is_admin }) {
  const hashed = await hashPassword(password);
  const isAdmin = toBool(is_admin);

  const query = `
    INSERT INTO public."users" (name, email, password, is_admin)
    VALUES ($1, $2, $3, $4)
    RETURNING id;
  `;
  const values = [name ?? null, email.toLowerCase(), hashed, isAdmin];

  const { rows } = await pool.query(query, values);
  const user = rows[0];
  return { id: user.id };
}

export async function loginUser({ email, password }) {
  const q = `SELECT id, password FROM users WHERE email = $1 LIMIT 1;`;
  const { rows } = await pool.query(q, [email.toLowerCase()]);
  if (rows.length === 0) return null;

  const user = rows[0];
  const ok = await comparePassword(password, user.password);
  if (!ok) return null;

  return { id: user.id };
}
