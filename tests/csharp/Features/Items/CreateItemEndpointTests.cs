using Api.Features.Items.CreateItem;
using Microsoft.AspNetCore.Http.HttpResults;
using Xunit;

namespace Api.Tests.Features.Items;

public class CreateItemEndpointTests
{
    [Fact]
    public void HandleAsync_ValidPayload_ReturnsCreatedResult()
    {
        var request = new CreateItemRequest("Test Item", 29.99m, "A sample test item description");

        var result = CreateItemEndpoint.HandleAsync(request);

        var createdResult = Assert.IsType<Created<CreateItemResponse>>(result);
        Assert.NotNull(createdResult.Value);
        Assert.Equal("Test Item", createdResult.Value.Name);
        Assert.Equal(29.99m, createdResult.Value.Price);
    }

    [Fact]
    public void HandleAsync_InvalidPrice_ReturnsBadRequest()
    {
        var request = new CreateItemRequest("Valid Name", -5.00m, "Description");

        var result = CreateItemEndpoint.HandleAsync(request);

        Assert.IsType<BadRequest<object>>(result);
    }
}