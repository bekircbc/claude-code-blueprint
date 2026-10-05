# Claude Code: 5-Layer Agent Development Kit (ADK) Architecture

Claude Code is a 5-layer operating system for software development. These layers stack and multiply productivity across individual developers and teams.

---

## The 5-Layer Stack

### Layer 1: CLAUDE.md — The Memory Layer
- **Role**: Serves as the agent's constitution and house rules.
- **Execution**: Loaded at the start of every session; always active.
- **Scope**: Defined globally (`~/.claude/CLAUDE.md`) or at the project root (`.claude/CLAUDE.md`).
- **Contents**: Architecture rules, naming conventions, test expectations, and codebase repo maps.

### Layer 2: Skills — The Knowledge Layer
- **Role**: On-demand, modular context chunks for repeatable jobs.
- **Execution**: Auto-invoked via description matching when needed. Runs in an isolated subagent to keep the main chat context clean.
- **Contents**: Task-specific context, reference documentation, scripts, and templates (`SKILL.md`).

### Layer 3: Hooks — The Guardrail Layer
- **Role**: Deterministic, non-AI rule enforcement (similar to Git hooks).
- **Execution**: Automatically triggered by system events without LLM reasoning.
- **Event Lifecycle**: `PreToolUse` → `PostToolUse` → `SessionStart` → `Stop` → `SubagentStop`.
- **Use Cases**: Auto-linting on write operations, blocking destructive commands (e.g., `rm -rf`), sending Slack notifications on session stop.

### Layer 4: Subagents — The Delegation Layer
- **Role**: Specialized AI agents assigned to do a single isolated job (`code-reviewer`, `test-runner`, `explorer`).
- **Execution**: Operates with its own context window, custom model, dedicated tools, and permissions. Receives delegated tasks and returns results only.
- **Safety**: Prevents infinite recursion (subagents cannot spawn other subagents). Keeps main context clean.

### Layer 5: Plugins — The Distribution Layer
- **Role**: Packaging and distribution mechanism for team-wide setup.
- **Execution**: Acts like npm packages for agent capabilities.
- **Contents**: Bundles skills, agents, hooks, and custom commands for one-click team installation via a Marketplace or shared repo.

---

## System Integrations & Wiring

- **MCP Servers (Model Context Protocol)**: Provides hands to all layers. Reaches external tools, GitHub, databases, APIs, and custom integrations from any layer.
- **Agent Teams**: Enables subagents to run in parallel. Handles message passing, shared permissions, and lead agent orchestration.

---

## Architectural Flow
`CLAUDE.md` sets rules → `Skills` provide expertise → `Hooks` enforce quality → `Subagents` delegate work → `Plugins` distribute to team.