#!/usr/bin/env bash
set -euo pipefail

echo "==> Running Python (FastAPI) Tests..."
pytest tests/python/ -v --disable-warnings