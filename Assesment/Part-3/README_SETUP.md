# Restaurant Order Management System - Laravel

## Setup Instructions

1. **Database Configuration**
   - Open `.env` file
   - Database is already configured to use SQLite (database/database.sqlite)

2. **Install Dependencies** (Already done)
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Run Migrations** (Already done)
   ```bash
   php artisan migrate
   ```

4. **Start Server**
   ```bash
   php artisan serve
   ```

5. **Access Application**
   - URL: http://localhost:8000
   - Register a new account to access the system

## Features Implemented

### Authentication
- Laravel Breeze authentication (login/register)
- Protected routes with auth middleware

### CRUD Operations
- **Menus**: Create, Read, Update, Delete menu items
- **Customers**: Manage customer information
- **Orders**: Create and manage orders

### Order Status Management
- Toggle order status between "pending" and "delivered"
- Click status button to toggle

### Dashboard
- Total orders count
- Top 5 menu items by order count
- Quick navigation to all modules

### Database Relationships
- Order belongsTo Customer
- Order belongsTo Menu
- Customer hasMany Orders
- Menu hasMany Orders

## Usage

1. **Register/Login**: Create account at /register
2. **Add Menu Items**: Navigate to Menus → Add Menu
3. **Add Customers**: Navigate to Customers → Add Customer
4. **Create Orders**: Navigate to Orders → Add Order
5. **Toggle Status**: Click status button in orders list
6. **View Dashboard**: See statistics and top items

## Reflective Answer: Scaling for Multiple Branches

### Implementation Strategies:

1. **Database Schema**
   - Add `branch_id` to menus, orders, customers tables
   - Create `branches` table with branch details
   - Add foreign key constraints

2. **Multi-Tenancy Approach**
   - **Single Database**: Add branch_id filter to all queries
   - **Database per Branch**: Separate database for each branch
   - **Schema per Branch**: Separate schema within same database

3. **User Roles & Permissions**
   - Branch Manager: Access only their branch data
   - Admin: Access all branches
   - Use Laravel Policies or Spatie Permission package

4. **Query Scoping**
   ```php
   // Global scope to filter by branch
   protected static function booted() {
       static::addGlobalScope('branch', function ($query) {
           if (auth()->user()->branch_id) {
               $query->where('branch_id', auth()->user()->branch_id);
           }
       });
   }
   ```

5. **Dashboard Enhancements**
   - Branch selector dropdown for admins
   - Branch-specific statistics
   - Comparative analytics across branches

6. **API Considerations**
   - RESTful API with branch context
   - Branch-specific API tokens
   - Rate limiting per branch

7. **Performance Optimization**
   - Database indexing on branch_id
   - Redis caching per branch
   - Query optimization with eager loading

8. **Reporting**
   - Branch-wise reports
   - Consolidated reports for management
   - Export functionality (PDF/Excel)
