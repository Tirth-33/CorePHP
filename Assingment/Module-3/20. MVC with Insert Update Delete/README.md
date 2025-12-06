# MVC Comment Management System

## Overview
Complete MVC (Model-View-Controller) application for managing user comments with full CRUD (Create, Read, Update, Delete) operations.

## MVC Architecture

### Model (models/Comment.php)
- **Database Connection**: Automatic database and table creation
- **CRUD Operations**: Insert, select, update, delete comments
- **Data Validation**: Server-side validation and sanitization
- **Sample Data**: Auto-populates with sample comments

### View (views/comments/)
- **index.php**: Display all comments with action buttons
- **create.php**: Form for adding new comments
- **edit.php**: Form for editing existing comments
- **Responsive Design**: Mobile-friendly interface

### Controller (controllers/CommentController.php)
- **Route Handling**: Manages all comment-related actions
- **Validation Logic**: Input validation and error handling
- **Session Management**: Flash messages and form data persistence
- **Business Logic**: Coordinates between Model and View

## Features
- **Complete CRUD Operations**: Create, Read, Update, Delete comments
- **Form Validation**: Client and server-side validation
- **Error Handling**: User-friendly error messages
- **Success Messages**: Confirmation feedback for actions
- **Responsive Design**: Works on desktop and mobile devices
- **Sample Data**: Pre-loaded with example comments

## Database Schema
```sql
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## File Structure
```
20. MVC with Insert Update Delete/
├── index.php                 # Main router
├── models/
│   └── Comment.php          # Comment model with database operations
├── views/
│   └── comments/
│       ├── index.php        # List all comments
│       ├── create.php       # Add new comment form
│       └── edit.php         # Edit comment form
├── controllers/
│   └── CommentController.php # Comment controller with CRUD logic
└── README.md               # Documentation
```

## URL Routes
- `index.php` - Display all comments (READ)
- `index.php?action=create` - Show add comment form
- `index.php?action=store` - Process new comment (CREATE)
- `index.php?action=edit&id=1` - Show edit form for comment ID 1
- `index.php?action=update&id=1` - Process comment update (UPDATE)
- `index.php?action=delete&id=1` - Delete comment ID 1 (DELETE)

## CRUD Operations

### Create (INSERT)
1. User clicks "Add New Comment"
2. Fills out form with name, email, comment
3. Form validates input on client and server
4. Comment saved to database
5. Success message displayed

### Read (SELECT)
1. Main page displays all comments
2. Shows comment details (name, email, text, date)
3. Displays total comment count
4. Ordered by newest first

### Update (UPDATE)
1. User clicks "Edit" on existing comment
2. Form pre-filled with current data
3. User modifies fields
4. Validation ensures data integrity
5. Database updated with new values

### Delete (DELETE)
1. User clicks "Delete" on comment
2. JavaScript confirmation dialog
3. Comment removed from database
4. Success message displayed

## Validation Rules
- **Name**: Required, non-empty string
- **Email**: Required, valid email format
- **Comment**: Required, non-empty text
- **Server-side**: PHP validation with error messages
- **Client-side**: HTML5 form validation

## Security Features
- **SQL Injection Prevention**: Prepared statements used throughout
- **XSS Protection**: All output properly escaped with htmlspecialchars()
- **Input Validation**: Comprehensive server-side validation
- **Session Security**: Proper session handling for flash messages

## Error Handling
- **Validation Errors**: Clear, user-friendly error messages
- **Database Errors**: Graceful handling of database connection issues
- **Form Persistence**: Form data retained on validation errors
- **Success Feedback**: Confirmation messages for successful operations

## Installation & Setup
1. **Database**: MySQL database created automatically
2. **Web Server**: Place files in web server directory
3. **PHP**: Requires PHP 7.0+ with PDO MySQL extension
4. **Permissions**: Ensure web server can create database

## Usage Examples
- **Blog Comments**: Manage comments on blog posts
- **Product Reviews**: Handle customer product reviews
- **Feedback System**: Collect and manage user feedback
- **Forum Posts**: Basic forum or discussion system
- **Testimonials**: Manage customer testimonials

## Customization Options
- **Styling**: Modify CSS in view files for custom design
- **Validation**: Add additional validation rules in controller
- **Fields**: Extend Comment model to include more fields
- **Pagination**: Add pagination for large comment lists
- **Authentication**: Add user authentication system

## No Setup Required
- Database and tables created automatically on first run
- Sample data inserted for immediate testing
- No configuration files or external dependencies
- Works immediately after copying to web server