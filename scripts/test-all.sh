#!/usr/bin/env bash
set -euo pipefail

echo "=========================================="
echo " Running Multi-Language Blueprint Tests   "
echo "=========================================="

echo "--> [1/5] Testing Python (Primary)..."
./scripts/test-python.sh

echo "--> [2/5] Testing C#..."
./scripts/test-csharp.sh

echo "--> [3/5] Testing Java..."
./scripts/test-java.sh

echo "--> [4/5] Testing Node.js..."
./scripts/test-nodejs.sh

echo "--> [5/5] Testing Symfony..."
./scripts/test-symfony.sh

echo "=========================================="
echo " All Language Suites Passed Successfully! "
echo "=========================================="