<?php

namespace App\Tests\Feature\Item;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CreateItemControllerTest extends WebTestCase
{
    public function testHandleValidPayloadReturnsCreated(): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/api/items',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'name' => 'Test Item',
                'price' => 29.99,
                'description' => 'Sample description'
            ])
        );

        $this->assertResponseStatusCodeSame(Response::HTTP_CREATED);
        
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('id', $responseData);
        $this->assertEquals('Test Item', $responseData['name']);
        $this->assertEquals(29.99, $responseData['price']);
    }

    public function testHandleInvalidPriceReturnsBadRequest(): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/api/items',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'name' => 'Test Item',
                'price' => -5.00
            ])
        );

        $this->assertResponseStatusCodeSame(Response::HTTP_BAD_REQUEST);
    }
}