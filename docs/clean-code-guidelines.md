# Clean Code Guidelines & Coding Standards

This document outlines the core clean code principles and conventions enforced across this repository. Both human developers and AI assistants (e.g., Claude Code) must adhere to these guidelines.

---

## 1. Naming Conventions

- **Meaningful and Expressive Names**: Use clear, intention-revealing names. Avoid abbreviations.
  - Incorrect: `usr`, `procData()`, `crtItm()`
  - Correct: `user`, `processOrderData()`, `CreateItemEndpoint`
- **Feature-based & Specific Names**: File and class names must represent their specific domain feature or responsibility.
  - Incorrect: `Service.cs`, `Handler.cs`, `Endpoint.cs`
  - Correct: `CreateItemEndpoint.cs`, `GetCustomerInvoiceQuery.cs`
- **Booleans**: Name boolean variables and properties as responses to yes/no questions (e.g., `isActive`, `hasPermission`, `canExecute`).

---

## 2. Functions and Methods

- **Do One Thing (Single Responsibility)**: A function or method should do only one thing, do it well, and do it only.
- **Small and Focused**: Keep functions short (ideally under 20–30 lines).
- **Function Arguments**:
  - Prefer 0 to 2 arguments.
  - If a function needs more than 3 arguments, encapsulate them into an object/DTO.
- **Side Effects**: Avoid hidden side effects. A method named `ValidateUser()` should only validate, not modify or save user data.

---

## 3. Class and File Design

- **Single Responsibility Principle (SRP)**: A class should have one, and only one, reason to change.
- **Cohesion**: Keep classes highly cohesive. Place related functionality together inside feature folders rather than layering by type.
- **File Length**: Keep source files focused and concise (aim for under 200–300 lines).

---

## 4. Comments and Documentation

- **Self-Documenting Code**: Code should explain *what* it does through clear naming and structure.
- **Why, Not What**: Use comments only to explain non-obvious business logic or decisions (*why* something was done), not to restate what the code clearly expresses.
- **Remove Dead Code**: Never comment out code. Rely on Git history for old implementations.

---

## 5. Error Handling & Guard Clauses

- **Fail Fast & Guard Clauses**: Validate inputs at the beginning of methods and return/throw early to prevent deep nesting.
- **Use Explicit Exceptions**: Throw specific domain exceptions rather than generic `Exception` types.
- **Do Not Swallow Exceptions**: Avoid empty `catch` blocks.

---

## 6. AI & Claude Code Alignment

- **Predictable Structure**: Follow the feature-folder pattern to allow keyword-based AI retrieval.
- **Verifiable Output**: Always accompany business logic changes with corresponding unit/integration tests to allow automatic AI verification.