namespace Api.Features.Items.CreateItem;

public record CreateItemRequest(string Name, decimal Price, string? Description);
public record CreateItemResponse(Guid Id, string Name, decimal Price, string? Description, DateTime CreatedAtUtc);

public static class CreateItemEndpoint
{
    public static void MapCreateItemEndpoint(this IEndpointRouteBuilder app)
    {
        app.MapPost("/api/items", HandleAsync)
           .WithName("CreateItem")
           .WithTags("Items")
           .Produces<CreateItemResponse>(StatusCodes.Status201Created)
           .ProducesProblem(StatusCodes.Status400BadRequest);
    }

    public static IResult HandleAsync(CreateItemRequest request)
    {
        if (string.IsNullOrWhiteSpace(request.Name))
        {
            return Results.BadRequest(new { Error = "Item name is required." });
        }

        if (request.Price <= 0)
        {
            return Results.BadRequest(new { Error = "Item price must be greater than zero." });
        }

        var response = new CreateItemResponse(
            Id: Guid.NewGuid(),
            Name: request.Name.Trim(),
            Price: request.Price,
            Description: request.Description?.Trim(),
            CreatedAtUtc: DateTime.UtcNow
        );

        return Results.Created($"/api/items/{response.Id}", response);
    }
}