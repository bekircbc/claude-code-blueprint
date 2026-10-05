import request from 'supertest';
import express from 'express';
import { registerCreateItemEndpoint } from '../../../../../src/nodejs/features/items/create-item/create-item-endpoint.js';

const app = express();
app.use(express.json());
registerCreateItemEndpoint(app);

describe('POST /api/items (Node.js)', () => {
  it('should return 201 Created for valid payload', async () => {
    const payload = {
      name: 'Test Item',
      price: 29.99,
      description: 'Sample description',
    };

    const response = await request(app)
      .post('/api/items')
      .send(payload);

    expect(response.status).toBe(201);
    expect(response.body).toHaveProperty('id');
    expect(response.body.name).toBe('Test Item');
    expect(response.body.price).toBe(29.99);
  });

  it('should return 400 Bad Request for invalid price', async () => {
    const payload = {
      name: 'Test Item',
      price: -10,
    };

    const response = await request(app)
      .post('/api/items')
      .send(payload);

    expect(response.status).toBe(400);
    expect(response.body).toHaveProperty('error');
  });
});