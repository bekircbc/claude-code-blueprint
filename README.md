# Claude Code Multi-Language Blueprint

Welcome to the **Claude Code Blueprint repository**. This project serves as a reference architecture designed around the **5-Layer Agent Development Kit (ADK)** stack for building robust, self-verifying, feature-folder structured applications across **5 primary technology stacks**:

- 🐍 **Python** (FastAPI) — *Primary Stack* (`src/python/`)
- ⚡ **C#** (.NET 8 Minimal APIs) (`src/csharp/`)
- ☕ **Java** (Spring Boot 3) (`src/java/`)
- 🟢 **Node.js** (Express) (`src/nodejs/`)
- 🐘 **PHP** (Symfony) (`src/symfony/`)

---

## Architecture Principles

1. **Feature-Folder Hierarchy**: Domain actions are isolated into feature directories containing endpoints, DTOs, and schemas together.
2. **Fail-Fast Guard Clauses**: Input validation happens explicitly at boundary layers before executing domain logic.
3. **Self-Verifying Pipelines**: Every feature includes dedicated unit and integration tests. Claude Code runs these automated pipelines to verify generated code before completing tasks.

---

## Quick Start & Pipeline Execution

Execute standardized single-command scripts in `scripts/` to run tests across stacks:

```bash
# Test primary language stack (Python)
./scripts/test-python.sh

# Test all supported language stacks
./scripts/test-all.sh

# Test individual stacks
./scripts/test-csharp.sh
./scripts/test-java.sh
./scripts/test-nodejs.sh
./scripts/test-symfony.sh