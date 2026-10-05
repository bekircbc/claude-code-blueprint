import { randomUUID } from 'crypto';
import { CreateItemRequest, CreateItemResponse } from './create-item-dto.js';

export function registerCreateItemEndpoint(app) {
  app.post('/api/items', (req, res) => {
    try {
      const request = new CreateItemRequest(req.body);
      request.validate();

      const response = new CreateItemResponse({
        id: randomUUID(),
        name: request.name.trim(),
        price: request.price,
        description: request.description ? request.description.trim() : null,
        createdAtUtc: new Date().toISOString(),
      });

      return res.status(201).json(response);
    } catch (error) {
      return res.status(400).json({ error: error.message });
    }
  });
}