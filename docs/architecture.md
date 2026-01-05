# Architecture Blueprint

## Overview
BCMS v1 is a monorepo containing:
- **Backend API**: Laravel 11, Sanctum, MySQL, Redis queues
- **Frontend Web**: Next.js 14 App Router, Tailwind

## Logical components
- Auth (Sanctum token)
- Core Masters: Company, Users, Roles/Groups, Services, Customers, Routers
- Billing: Invoices, Payments, Reminders
- Support: Ticketing
- Observability/Audit: Audit logs for sensitive actions, integration events
- Integration: Mikrotik baseline service (stub), queued sync jobs

## Data flow (high level)
1. Frontend calls REST API via `/api/*`.
2. Laravel authenticates via Sanctum token.
3. Writes to MySQL; async work enqueued to Redis.
4. Workers consume queues and write audit logs.

## Security
- Token-based auth via Sanctum
- Audit logs for mutations & integration actions
- Environment-driven secrets (never commit credentials)

## API conventions
- Prefix: `/api`
- Auth endpoints under `/api/auth/*`
- CRUD resource endpoints under `/api/*`