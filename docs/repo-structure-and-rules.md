# Multi-Language Directory Layout for Claude Code

This repository contains ready-to-use implementations across 5 different language stacks, all adhering to the feature-folder pattern.

---

## Multi-Language Directory Tree

```text
claude-code-blueprint/
├── CLAUDE.md                       # Global project memory & rules
├── README.md                       # Main blueprint documentation & prompts
├── docs/                           # ADK, clean code, and repository rules
├── src/
│   ├── python/                     # Primary Stack (FastAPI)
│   │   ├── features/
│   │   │   └── items/
│   │   │       └── create_item/
│   │   │           ├── create_item_schemas.py
│   │   │           └── create_item_endpoint.py
│   │   └── main.py
│   ├── csharp/                     # C# / .NET 8
│   │   └── Features/Items/CreateItem/
│   ├── java/                       # Java / Spring Boot
│   │   └── features/items/createitem/
│   ├── nodejs/                     # Node.js / Express
│   │   └── features/items/create-item/
│   └── symfony/                    # PHP / Symfony
│       └── src/Feature/Item/CreateItem/
├── tests/                          # Automated tests matching each language stack
│   ├── python/
│   ├── csharp/
│   ├── java/
│   ├── nodejs/
│   └── symfony/
└── scripts/                        # Language-specific pipeline runners
    ├── test-python.sh
    ├── test-csharp.sh
    ├── test-java.sh
    ├── test-nodejs.sh
    ├── test-symfony.sh
    └── test-all.sh
```