# Installation Guide

## Local development

### Backend (Laravel)
1. `cd backend`
2. `cp .env.example .env`
3. Configure:
   - `DB_*` for MySQL
   - `QUEUE_CONNECTION=redis` + `REDIS_*`
4. Install & run:
```bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

### Queue worker
```bash
cd backend
php artisan queue:work
```

### Frontend (Next.js)
```bash
cd frontend
pnpm install
pnpm dev
```

## Production (Ubuntu)
- PHP-FPM + Nginx: see `nginx-phpfpm-ubuntu.md`
- Use Supervisor/systemd for queue workers
- Configure `.env` properly (APP_KEY, DB, REDIS)