# CRUD Application with Resource Controllers

## Overview
This is a complete CRUD (Create, Read, Update, Delete) application for managing blog categories using resource controllers pattern.

## Features
- **Resource Controller**: CategoryController with all standard CRUD methods
- **Database Integration**: MySQL database with PDO
- **Complete Views**: All necessary views for CRUD operations
- **Responsive Design**: Clean, simple styling

## Resource Routes
- `GET /` or `?action=index` - Display all categories (index)
- `GET /?action=create` - Show create form (create)
- `POST /?action=store` - Store new category (store)
- `GET /?action=show&id={id}` - Show specific category (show)
- `GET /?action=edit&id={id}` - Show edit form (edit)
- `POST /?action=update&id={id}` - Update category (update)
- `GET /?action=destroy&id={id}` - Delete category (destroy)

## Setup Instructions
1. Create MySQL database named `blog_db`
2. Update database credentials in `Database.php` if needed
3. Place files in your web server directory
4. Access via browser: `http://localhost/path-to-project/`

## File Structure
```
├── index.php              # Main router
├── Category.php           # Category model
├── CategoryController.php # Resource controller
├── Database.php          # Database connection and operations
└── views/
    └── categories/
        ├── index.php      # List all categories
        ├── create.php     # Create form
        ├── edit.php       # Edit form
        └── show.php       # Show single category
```

## CRUD Operations
- **Create**: Add new categories with name and description
- **Read**: View all categories or individual category details
- **Update**: Edit existing category information
- **Delete**: Remove categories with confirmation