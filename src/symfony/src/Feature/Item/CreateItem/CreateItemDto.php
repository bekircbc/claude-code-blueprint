<?php

namespace App\Feature\Item\CreateItem;

use Symfony\Component\Validator\Constraints as Assert;

class CreateItemRequest
{
    #[Assert\NotBlank(message: "Item name is required.")]
    public ?string $name = null;

    #[Assert\NotNull]
    #[Assert\GreaterThan(value: 0, message: "Item price must be greater than zero.")]
    public ?float $price = null;

    public ?string $description = null;
}

class CreateItemResponse
{
    public function __construct(
        public string $id,
        public string $name,
        public float $price,
        public ?string $description,
        public string $createdAtUtc
    ) {}
}