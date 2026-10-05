#!/usr/bin/env bash
set -euo pipefail

echo "==> Running tests..."
dotnet test --configuration Release --no-build --verbosity normal