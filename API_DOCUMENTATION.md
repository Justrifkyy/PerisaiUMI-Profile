# PERISAI UMI API Documentation

## Base URL
```
http://localhost:8000/api
```

## Authentication
This API uses Laravel Sanctum for authentication. Include the Bearer token in the Authorization header for protected endpoints.

```
Authorization: Bearer {your-token-here}
```

## Admin Credentials
- **Email**: `admin@perisaiumi.ac.id`
- **Password**: `password`

---

## Public Endpoints

### Get All News
```http
GET /api/news
```

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "title": "PERISAI HUMANITY",
      "description": "Program kemanusiaan dan pengabdian masyarakat...",
      "image": "images/prestasi.jpg",
      "gradient": "from-yellow-500 to-yellow-700",
      "category": "humanity",
      "is_published": true,
      "published_at": "2025-11-28T03:20:00.000000Z",
      "order": 1
    }
  ]
}
```

### Get Single News
```http
GET /api/news/{id}
```

### Get All Statistics
```http
GET /api/statistics
```

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "label": "Alumni UKM Perisai UMI",
      "period": "2014-2024",
      "number": 100,
      "bg_class": "bg-zinc-800",
      "text_class": "text-gray-400",
      "order": 1,
      "is_active": true
    }
  ]
}
```

### Get All Departments
```http
GET /api/departments
```

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "name": "PSDM",
      "full_name": "Pengembangan Sumber Daya Manusia",
      "description": null,
      "icon": null,
      "order": 1,
      "is_active": true
    }
  ]
}
```

### Get Department with Organizational Structure
```http
GET /api/departments/{id}
```

---

## Authentication Endpoints

### Login
```http
POST /api/login
```

**Request Body:**
```json
{
  "email": "admin@perisaiumi.ac.id",
  "password": "password"
}
```

**Response:**
```json
{
  "message": "Login successful",
  "data": {
    "user": {
      "id": 1,
      "name": "Admin PERISAI",
      "email": "admin@perisaiumi.ac.id"
    },
    "token": "1|abc123xyz..."
  }
}
```

### Get Current User
```http
GET /api/user
Authorization: Bearer {token}
```

**Response:**
```json
{
  "data": {
    "id": 1,
    "name": "Admin PERISAI",
    "email": "admin@perisaiumi.ac.id"
  }
}
```

### Logout
```http
POST /api/logout
Authorization: Bearer {token}
```

**Response:**
```json
{
  "message": "Logout successful"
}
```

---

## Protected Admin Endpoints

### News Management

#### Create News
```http
POST /api/news
Authorization: Bearer {token}
```

**Request Body:**
```json
{
  "title": "New Achievement",
  "description": "Description here...",
  "image": "images/news.jpg",
  "gradient": "from-yellow-500 to-yellow-700",
  "category": "achievement",
  "is_published": true,
  "published_at": "2025-11-28T10:00:00",
  "order": 3
}
```

#### Update News
```http
PUT /api/news/{id}
Authorization: Bearer {token}
```

**Request Body:**
```json
{
  "title": "Updated Title",
  "is_published": false
}
```

#### Delete News
```http
DELETE /api/news/{id}
Authorization: Bearer {token}
```

### Statistics Management

#### Update Statistic
```http
PUT /api/statistics/{id}
Authorization: Bearer {token}
```

**Request Body:**
```json
{
  "number": 120,
  "label": "Alumni UKM Perisai UMI",
  "period": "2014-2025"
}
```

### Departments Management

#### Create Department
```http
POST /api/departments
Authorization: Bearer {token}
```

**Request Body:**
```json
{
  "name": "FUNDRAISING",
  "full_name": "Fundraising dan Kemitraan",
  "description": "Department description",
  "order": 7,
  "is_active": true
}
```

#### Update Department
```http
PUT /api/departments/{id}
Authorization: Bearer {token}
```

#### Delete Department
```http
DELETE /api/departments/{id}
Authorization: Bearer {token}
```

---

## Error Responses

### 401 Unauthorized
```json
{
  "message": "Unauthenticated."
}
```

### 404 Not Found
```json
{
  "message": "No query results for model [App\\Models\\News] {id}"
}
```

### 422 Validation Error
```json
{
  "message": "The title field is required.",
  "errors": {
    "title": ["The title field is required."]
  }
}
```

---

## Testing with cURL

### Login Example
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@perisaiumi.ac.id","password":"password"}'
```

### Get News Example
```bash
curl http://localhost:8000/api/news
```

### Create News (Authenticated)
```bash
curl -X POST http://localhost:8000/api/news \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -d '{
    "title": "Test News",
    "description": "Test description",
    "is_published": true
  }'
```

---

## Database Seeded Data

The database includes:
- **1 Admin User**: admin@perisaiumi.ac.id
- **2 News Items**: PERISAI Humanity, Prestasi PERISAI
- **2 Statistics**: Alumni (100), Current Members (58)
- **6 Departments**: PSDM, KOMPRES, HUMAS, RISTEK, PENALARAN, MEDIA

---

## Next Steps

1. Configure CORS for frontend integration
2. Add file upload for images
3. Create vision/mission and organizational structure endpoints
4. Add pagination for news listing
5. Implement search/filtering
6. Add API rate limiting
7. Create comprehensive tests

