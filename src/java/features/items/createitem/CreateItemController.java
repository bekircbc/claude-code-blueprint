package com.example.api.features.items.createitem;

import jakarta.validation.Valid;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.Positive;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.time.Instant;
import java.util.UUID;

@RestController
@RequestMapping("/api/items")
public class CreateItemController {

    public record CreateItemRequest(
        @NotBlank(message = "Item name is required") String name,
        @Positive(message = "Item price must be greater than zero") Double price,
        String description
    ) {}

    public record CreateItemResponse(
        UUID id,
        String name,
        Double price,
        String description,
        Instant createdAtUtc
    ) {}

    @PostMapping
    public ResponseEntity<CreateItemResponse> handle(
            @Valid @RequestBody CreateItemRequest request) {

        var response = new CreateItemResponse(
                UUID.randomUUID(),
                request.name().trim(),
                request.price(),
                request.description() != null ? request.description().trim() : null,
                Instant.now()
        );

        return ResponseEntity.status(HttpStatus.CREATED).body(response);
    }
}