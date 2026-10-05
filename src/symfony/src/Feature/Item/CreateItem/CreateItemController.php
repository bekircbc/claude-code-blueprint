<?php

namespace App\Feature\Item\CreateItem;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreateItemController extends AbstractController
{
    #[Route('/api/items', name: 'create_item', methods: ['POST'])]
    public function handle(Request $request, ValidatorInterface $validator): JsonResponse
    {
        $data = json_decode($request->getContent(), true) ?? [];
        
        $dto = new CreateItemRequest();
        $dto->name = $data['name'] ?? null;
        $dto->price = isset($data['price']) ? (float)$data['price'] : null;
        $dto->description = $data['description'] ?? null;

        $errors = $validator->validate($dto);
        if (count($errors) > 0) {
            return $this->json(['error' => (string) $errors->get(0)->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        $response = new CreateItemResponse(
            id: Uuid::v4()->toRfc4122(),
            name: trim($dto->name),
            price: $dto->price,
            description: $dto->description ? trim($dto->description) : null,
            createdAtUtc: (new \DateTimeZone('UTC'))->getName()
        );

        return $this->json($response, Response::HTTP_CREATED);
    }
}