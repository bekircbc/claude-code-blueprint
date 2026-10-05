#!/usr/bin/env bash
set -euo pipefail

echo "==> Running Node.js (Express) Tests..."
npm --prefix src/nodejs test