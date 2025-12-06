# Product Catalog Setup Instructions

## 1. Database Setup
1. Start XAMPP (Apache + MySQL)
2. Open phpMyAdmin: `http://localhost/phpmyadmin`
3. Import `database.sql` file OR run the SQL commands manually
4. Verify database `product_catalog` is created with sample data

## 2. Configuration
- Database settings are in `config.php`
- Default settings: host=localhost, user=root, password='' (empty)
- Modify if your MySQL settings are different

## 3. Access the Catalog
- URL: `http://localhost/Revision/Assingment/Module-3/5.%20Product%20Catalog/index.php`

## 4. Features
- ✅ Product grid display
- ✅ Search functionality
- ✅ Category filtering
- ✅ Responsive design
- ✅ Stock status display
- ✅ Price formatting in INR

## 5. Database Schema
```sql
products table:
- id (Primary Key, Auto Increment)
- name (Product Name)
- description (Product Description)
- price (Decimal 10,2)
- category (Product Category)
- image_url (Product Image URL)
- stock_quantity (Available Stock)
- created_at (Timestamp)
```