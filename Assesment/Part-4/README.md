# Student Grades API

## Endpoints

### Authentication
- `POST /api/login` - Student login with email/password

### Protected Endpoints (require Bearer token)
- `GET /api/grades` - Get student's grades with pagination
- `GET /api/grades/{id}` - Get specific grade (own data only)
- `GET /api/subjects` - Get subjects for which student has grades

## Security Features

### Sanctum Authentication
- Token-based authentication using Laravel Sanctum
- Students can only access their own data
- Automatic token validation on protected routes

### Access Control
- Role-based access: Students cannot access other students' data
- Unauthorized access attempts are logged and blocked with 403 error
- IP-based tracking of failed authentication attempts

### Suspicious Activity Logging
The `LogSuspiciousActivity` middleware tracks:
- Failed authentication attempts (5+ attempts trigger alert)
- High API usage (100+ requests in 5 minutes)
- Unauthorized data access attempts
- All suspicious activities logged with IP, timestamp, and user details

## Pagination & Ordering

### Custom Pagination
- `per_page` parameter (max 50, default 10)
- Returns pagination metadata with current_page, total, last_page

### Custom Ordering
- `sort_by` parameter: grade, semester, created_at
- `sort_order` parameter: asc, desc (default asc)

## Usage Examples

```bash
# Login
curl -X POST /api/v1/login -d "email=student@example.com&password=secret"

# Get grades with pagination and sorting
curl -H "Authorization: Bearer {token}" "/api/v1/grades?per_page=20&sort_by=grade&sort_order=desc"

# Get specific grade
curl -H "Authorization: Bearer {token}" "/api/v1/grades/1"

# Get subjects
curl -H "Authorization: Bearer {token}" "/api/v1/subjects"
```