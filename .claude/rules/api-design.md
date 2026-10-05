# API Design Rules & Conventions

These rules apply when creating or modifying REST API endpoints, DTOs, and request handlers.

---

## Endpoint Standards

1. **Feature Directory Alignment**: Place endpoints inside `src/Api/Features/[FeatureName]/[ActionName]/`.
2. **Explicit Class Naming**: Endpoints must end with `Endpoint.cs` preceded by the full action name (e.g., `CreateItemEndpoint.cs`).
3. **HTTP Verbs & Status Codes**:
   - `POST`: Return `201 Created` with resource identifier location.
   - `GET`: Return `200 OK` for collections or single entities; return `404 Not Found` when missing.
   - `PUT`/`PATCH`: Return `200 OK` or `204 No Content`.
   - `DELETE`: Return `204 No Content`.

---

## DTO & Request Handling

- **Immutable DTOs**: Use C# `record` types for Request and Response DTOs.
- **Validation**: Place request validation logic close to the endpoint using Guard clauses or FluentValidation.
- **Single Request/Response Pair**: Each endpoint must define its dedicated Request and Response DTOs inside `[Action]Dtos.cs`.