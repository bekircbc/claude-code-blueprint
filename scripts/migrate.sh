#!/usr/bin/env bash
set -euo pipefail

echo "==> Running database migrations..."
dotnet ef database update --project src/Api