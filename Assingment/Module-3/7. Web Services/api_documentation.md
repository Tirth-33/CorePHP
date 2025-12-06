# Product Web Service API Documentation

## Base URL
`http://localhost/Revision/Assingment/Module-3/7.%20Web%20Services/products_service.php`

## Endpoints

### 1. Get All Products
- **Method:** GET
- **URL:** `/products_service.php`
- **Description:** Returns all available products
- **Response:** Array of product objects

### 2. Get Product by ID
- **Method:** GET
- **URL:** `/products_service.php?id={product_id}`
- **Parameters:** 
  - `id` (integer) - Product ID
- **Response:** Single product object or error

### 3. Filter by Category
- **Method:** GET
- **URL:** `/products_service.php?category={category_name}`
- **Parameters:**
  - `category` (string) - Category name (Electronics, Clothing, etc.)
- **Response:** Array of products in specified category

### 4. Search Products
- **Method:** GET
- **URL:** `/products_service.php?search={search_term}`
- **Parameters:**
  - `search` (string) - Search term for name/description
- **Response:** Array of matching products

## Response Format

### Success Response
```json
{
  "error": false,
  "message": "Success message",
  "data": [...],
  "timestamp": "2024-01-01 12:00:00"
}
```

### Error Response
```json
{
  "error": true,
  "code": 404,
  "message": "Error description",
  "timestamp": "2024-01-01 12:00:00"
}
```

## HTTP Status Codes
- **200** - Success
- **404** - Resource not found
- **405** - Method not allowed
- **500** - Internal server error

## Example Usage

### cURL Examples
```bash
# Get all products
curl "http://localhost/Revision/Assingment/Module-3/7.%20Web%20Services/products_service.php"

# Get product by ID
curl "http://localhost/Revision/Assingment/Module-3/7.%20Web%20Services/products_service.php?id=1"

# Filter by category
curl "http://localhost/Revision/Assingment/Module-3/7.%20Web%20Services/products_service.php?category=Electronics"

# Search products
curl "http://localhost/Revision/Assingment/Module-3/7.%20Web%20Services/products_service.php?search=laptop"
```

### JavaScript Example
```javascript
fetch('products_service.php?id=1')
  .then(response => response.json())
  .then(data => {
    if (!data.error) {
      console.log('Product:', data.data);
    } else {
      console.error('Error:', data.message);
    }
  });
```