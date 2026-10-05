#!/usr/bin/env bash
set -euo pipefail

echo "==> Running Symfony (PHP) Tests..."
./src/symfony/vendor/bin/phpunit -c src/symfony/phpunit.xml.dist