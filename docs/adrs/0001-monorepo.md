# ADR 0001: Monorepo

## Status
Accepted

## Context
We need to version backend and frontend together and ship consistent releases.

## Decision
Use a single repository with `backend/`, `frontend/`, and `docs/`.

## Consequences
- Easier coordinated changes
- CI must handle two stacks