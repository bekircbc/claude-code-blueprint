from datetime import datetime, timezone
from uuid import uuid4
from fastapi import APIRouter, HTTPException, status
from src.python.features.items.create_item.create_item_schemas import (
    CreateItemRequest,
    CreateItemResponse,
)

router = APIRouter(prefix="/api/items", tags=["Items"])


@router.post("", response_model=CreateItemResponse, status_code=status.HTTP_201_CREATED)
async def create_item(request: CreateItemRequest) -> CreateItemResponse:
    if not request.name.strip():
        raise HTTPException(
            status_code=status.HTTP_400_BAD_REQUEST,
            detail="Item name cannot be empty.",
        )

    return CreateItemResponse(
        id=uuid4(),
        name=request.name.strip(),
        price=request.price,
        description=request.description.strip() if request.description else None,
        created_at_utc=datetime.now(timezone.utc),
    )