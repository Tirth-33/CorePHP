# Setup Instructions

## Prerequisites
- PHP 8.1+
- Composer
- MySQL/XAMPP running

## Installation Steps

1. Install dependencies:
```bash
composer install
```

2. Create database:
```sql
CREATE DATABASE student_grades;
```

3. Run migrations:
```bash
php artisan migrate
```

4. Generate app key:
```bash
php artisan key:generate
```

5. Start server:
```bash
php artisan serve
```

## Test the API

1. Create a test student:
```sql
INSERT INTO students (name, email, student_id, password) 
VALUES ('John Doe', 'john@test.com', 'STU001', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
```

2. Login:
```bash
curl -X POST http://localhost:8000/api/login -d "email=john@test.com&password=password"
```

3. Use returned token for protected endpoints:
```bash
curl -H "Authorization: Bearer YOUR_TOKEN" http://localhost:8000/api/grades
```