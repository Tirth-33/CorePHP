# Product Images Directory

## How to Add Images:

1. **Place your product images in this folder**
2. **Supported formats:** JPG, PNG, GIF
3. **Recommended size:** 300x200 pixels or similar aspect ratio
4. **File naming:** Use descriptive names (e.g., laptop.jpg, smartphone.png)

## Current Image Requirements:

Based on the database, you need these images:
- `laptop.jpg` - For laptop product
- `smartphone.jpg` - For smartphone product  
- `headphones.jpg` - For headphones product
- `tshirt.jpg` - For t-shirt product
- `jeans.jpg` - For jeans product
- `mug.jpg` - For coffee mug product

## Alternative Options:

If you don't have images, you can:
1. **Use placeholder images** - The system will show a broken image icon
2. **Download free images** from sites like Unsplash or Pexels
3. **Use the placeholder URLs** (already working in current setup)

## Update Database:

To use your own images, update the `image_url` field in the database:
```sql
UPDATE products SET image_url = 'images/your-image.jpg' WHERE id = 1;
```