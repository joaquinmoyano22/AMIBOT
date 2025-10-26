import bcrypt from 'bcryptjs';

const rounds = parseInt(process.env.BCRYPT_SALT_ROUNDS || '10', 10);

export async function hashPassword(plain) {
  const salt = await bcrypt.genSalt(rounds);
  return bcrypt.hash(plain, salt);
}

export async function comparePassword(plain, hashed) {
  return bcrypt.compare(plain, hashed);
}
