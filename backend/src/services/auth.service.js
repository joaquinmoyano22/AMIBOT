import { pool } from '../db/index.js';
import { hashPassword, comparePassword } from '../utils/password.js';

export async function registerUser({ email, password }) {
  const hashed = await hashPassword(password);

  const query = `
    INSERT INTO users (email, password)
    VALUES ($1, $2)
    RETURNING id;
  `;
  const values = [email.toLowerCase(), hashed];

  const { rows } = await pool.query(query, values);
  return rows[0]; // { id }
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
