from fastapi.testclient import TestClient
from src.python.main import app

client = TestClient(app)


def test_create_item_valid_payload_returns_created():
    payload = {
        "name": "Test Item",
        "price": 29.99,
        "description": "A sample test item description",
    }
    response = client.post("/api/items", json=payload)

    assert response.status_code == 201
    data = response.json()
    assert data["name"] == "Test Item"
    assert data["price"] == 29.99
    assert "id" in data


def test_create_item_invalid_price_returns_bad_request():
    payload = {"name": "Valid Name", "price": -5.00}
    response = client.post("/api/items", json=payload)

    assert response.status_code == 422