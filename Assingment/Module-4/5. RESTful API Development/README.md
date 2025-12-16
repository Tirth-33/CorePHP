# Product Inventory RESTful API

## Setup Instructions

1. **Install Laravel dependencies:**
   ```bash
   composer install
   ```

2. **Configure environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database setup:**
   - Configure database in `.env` file
   - Run migration:
   ```bash
   php artisan migrate
   ```

4. **Start server:**
   ```bash
   php artisan serve
   ```

## API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/products` | Get all products |
| POST | `/api/products` | Create new product |
| GET | `/api/products/{id}` | Get single product |
| PUT | `/api/products/{id}` | Update product |
| DELETE | `/api/products/{id}` | Delete product |

## Request/Response Examples

### Create Product (POST /api/products)
```json
{
  "name": "Sample Product",
  "description": "Product description",
  "price": 29.99,
  "quantity": 100,
  "sku": "PROD-001"
}
```

### Response Format
```json
{
  "success": true,
  "message": "Product created successfully",
  "data": {
    "id": 1,
    "name": "Sample Product",
    "description": "Product description",
    "price": "29.99",
    "quantity": 100,
    "sku": "PROD-001",
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T00:00:00.000000Z"
  }
}
```

## Testing with Postman

1. Import `postman_collection.json` into Postman
2. Set `base_url` variable to your Laravel app URL (default: http://localhost:8000)
3. Test all endpoints using the provided collection

## File Structure

- `Product.php` - Eloquent model
- `create_products_table.php` - Database migration
- `ProductController.php` - Resource controller
- `api.php` - API routes
- `postman_collection.json` - Postman test collection