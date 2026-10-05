# Repository Guidelines & House Rules

This repository serves as a multi-language reference blueprint for building applications optimized for **Claude Code** and the **5-Layer Agent Development Kit (ADK)** architecture.

---

## Language Stacks & Architecture

- **Primary Language & Stack**: Python 3.11+ / FastAPI / Pydantic (`src/python/`)
- **Supported Reference Languages**:
  - **C# / .NET 8**: `src/csharp/`
  - **Java / Spring Boot**: `src/java/`
  - **Node.js / Express**: `src/nodejs/`
  - **PHP / Symfony**: `src/symfony/`
- **Architecture Pattern**: Feature-based domain packaging, Fail-Fast Guard Clauses, Self-Verifying Code via Automated Unit/Integration Tests.

---

## Pipeline Execution Commands

Always use the standardized bash scripts in `scripts/` to run pipelines for the target language stack:

- **Python**: `./scripts/test-python.sh` | `./scripts/build-python.sh`
- **C#**: `./scripts/test-csharp.sh` | `./scripts/build-csharp.sh`
- **Java**: `./scripts/test-java.sh` | `./scripts/build-java.sh`
- **Node.js**: `./scripts/test-nodejs.sh` | `./scripts/build-nodejs.sh`
- **Symfony**: `./scripts/test-symfony.sh` | `./scripts/build-symfony.sh`
- **All Languages**: `./scripts/test-all.sh`

---

## Codebase Navigation & Conventions

1. **Feature-Folder Organization**: Every language implementation must keep endpoints, schemas/DTOs, and logic inside domain feature folders (e.g., `features/items/create_item/`).
2. **Explicit Keyword Naming**: Avoid generic names like `service`, `handler`, or `controller`. Use feature-specific names (e.g., `create_item_endpoint`, `create_item_dto`).
3. **Off-Limits Directories**: Do not touch virtual environments (`.venv/`), build output (`bin/`, `obj/`, `target/`, `dist/`), or secret/environment files.