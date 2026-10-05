#!/usr/bin/env bash
set -euo pipefail

echo "==> Running C# (.NET) Tests..."
dotnet test tests/Api.Tests/Api.Tests.csproj --configuration Release --verbosity normal