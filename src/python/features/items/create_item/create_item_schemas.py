from datetime import datetime
from typing import Optional
from uuid import UUID
from pydantic import BaseModel, Field


class CreateItemRequest(BaseModel):
    name: str = Field(..., min_length=1, description="Item name is required")
    price: float = Field(..., gt=0, description="Price must be greater than zero")
    description: Optional[str] = None


class CreateItemResponse(BaseModel):
    id: UUID
    name: str
    price: float
    description: Optional[str] = None
    created_at_utc: datetime