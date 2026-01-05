# BCMS v1 — Monorepo

Backend: Laravel 11 + Sanctum + MySQL + Redis queues  
Frontend: Next.js 14 (App Router) + pnpm + Tailwind  
Docs: Nginx + PHP-FPM deployment on Ubuntu

## Repo layout
- `backend/` Laravel API
- `frontend/` Next.js web app
- `docs/` Architecture, ADRs, deployment

## Prerequisites
- PHP 8.2+
- Composer 2.x
- Node 18/20+
- pnpm 9+
- MySQL 8+
- Redis 6+

## Quick start (dev)

### 1) Backend
```bash
cd backend
cp .env.example .env
composer install
php artisan key:generate

# configure DB + Redis in .env
php artisan migrate --seed
php artisan serve
```

### 2) Frontend
```bash
cd frontend
pnpm install
pnpm dev
```

### 3) Auth flow
- `POST /api/auth/login`
- `POST /api/auth/logout`
- `GET /api/auth/me`

Sanctum uses token auth. See `docs/installation.md`.

## CI
GitHub Actions workflows:
- `backend-ci.yml` (PHP/Laravel tests)
- `frontend-ci.yml` (pnpm install + build + lint)

## Deployment
See `docs/nginx-phpfpm-ubuntu.md`.

## Struktur folder repository
bcms_v1/
├─ .github/
│  ├─ workflows/
│  │  ├─ backend-ci.yml
│  │  └─ frontend-ci.yml
│  ├─ ISSUE_TEMPLATE/
│  │  ├─ bug_report.md
│  │  └─ feature_request.md
│  └─ pull_request_template.md
├─ docs/
│  ├─ adrs/
│  │  └─ 0001-monorepo.md
│  ├─ architecture.md
│  ├─ installation.md
│  ├─ nginx-phpfpm-ubuntu.md
│  └─ README.md
├─ backend/
│  ├─ app/
│  │  ├─ Http/Controllers/*.php
│  │  ├─ Jobs/*.php
│  │  ├─ Models/*.php
│  │  ├─ Providers/AppServiceProvider.php
│  │  └─ Services/MikrotikService.php
│  ├─ bootstrap/app.php
│  ├─ config/*.php
│  ├─ database/
│  │  ├─ migrations/*.php
│  │  └─ seeders/*.php
│  ├─ public/index.php
│  ├─ routes/*.php
│  ├─ tests/Feature/HealthTest.php
│  ├─ .env.example
│  ├─ .gitignore
│  ├─ artisan
│  ├─ composer.json
│  ├─ phpunit.xml
│  └─ README.md
├─ frontend/
│  ├─ app/
│  │  ├─ globals.css
│  │  ├─ layout.tsx
│  │  └─ page.tsx
│  ├─ .gitignore
│  ├─ next-env.d.ts
│  ├─ next.config.mjs
│  ├─ package.json
│  ├─ postcss.config.js
│  ├─ tailwind.config.ts
│  ├─ tsconfig.json
│  └─ README.md
└─ README.md