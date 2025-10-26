export function errorHandler(err, req, res, next) {
  if (process.env.NODE_ENV !== 'test') {
    console.error(err);
  }

  if (err.code === '23505') {
    return res.status(409).json({ error: 'EMAIL_ALREADY_EXISTS' });
  }

  return res.status(500).json({ error: 'INTERNAL_SERVER_ERROR' });
}
