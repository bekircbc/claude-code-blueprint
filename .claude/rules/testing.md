# Testing Standards & Guardrails

These rules apply whenever unit or integration tests are written, modified, or executed.

---

## Testing Principles

1. **Arrange-Act-Assert (AAA)**: Every test method must explicitly structure setup, execution, and verification into separate blocks.
2. **Isolation**: Tests must execute independently without reliance on shared state or ordering.
3. **Execution Pipeline**: Always verify tests using the repository script:
   ```bash
   ./scripts/test.sh
   ```