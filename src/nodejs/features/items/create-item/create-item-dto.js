export class CreateItemRequest {
  constructor({ name, price, description }) {
    this.name = name;
    this.price = price;
    this.description = description;
  }

  validate() {
    if (!this.name || typeof this.name !== 'string' || this.name.trim() === '') {
      throw new Error('Item name is required.');
    }
    if (typeof this.price !== 'number' || this.price <= 0) {
      throw new Error('Item price must be greater than zero.');
    }
  }
}

export class CreateItemResponse {
  constructor({ id, name, price, description, createdAtUtc }) {
    this.id = id;
    this.name = name;
    this.price = price;
    this.description = description;
    this.createdAtUtc = createdAtUtc;
  }
}