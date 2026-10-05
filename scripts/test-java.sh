#!/usr/bin/env bash
set -euo pipefail

echo "==> Running Java (Spring Boot) Tests..."
./src/java/mvnw test -f src/java/pom.xml