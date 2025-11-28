# PERISAI UMI Admin API Test Script
# Run this in PowerShell to test your admin endpoints

$baseUrl = "http://127.0.0.1:8000/api"

Write-Host "=== PERISAI UMI Admin API Test ===" -ForegroundColor Cyan
Write-Host ""

# Step 1: Login
Write-Host "1. Logging in as admin..." -ForegroundColor Yellow
try {
    $loginResponse = Invoke-RestMethod -Uri "$baseUrl/login" `
        -Method POST `
        -ContentType "application/json" `
        -Body '{"email":"admin@perisaiumi.ac.id","password":"password"}'
    
    $token = $loginResponse.data.token
    Write-Host "✓ Login successful!" -ForegroundColor Green
    Write-Host "Token: $token" -ForegroundColor Gray
    Write-Host "User: $($loginResponse.data.user.name)" -ForegroundColor Gray
    Write-Host ""
} catch {
    Write-Host "✗ Login failed: $_" -ForegroundColor Red
    exit
}

# Step 2: Get current user info
Write-Host "2. Getting current user info..." -ForegroundColor Yellow
try {
    $userResponse = Invoke-RestMethod -Uri "$baseUrl/user" `
        -Method GET `
        -Headers @{"Authorization"="Bearer $token"}
    
    Write-Host "✓ User info retrieved!" -ForegroundColor Green
    Write-Host "Name: $($userResponse.data.name)" -ForegroundColor Gray
    Write-Host "Email: $($userResponse.data.email)" -ForegroundColor Gray
    Write-Host ""
} catch {
    Write-Host "✗ Failed to get user: $_" -ForegroundColor Red
}

# Step 3: Get all news
Write-Host "3. Fetching all news..." -ForegroundColor Yellow
try {
    $newsResponse = Invoke-RestMethod -Uri "$baseUrl/news" -Method GET
    Write-Host "✓ Found $($newsResponse.data.Count) news items" -ForegroundColor Green
    foreach ($news in $newsResponse.data) {
        Write-Host "  - [$($news.id)] $($news.title)" -ForegroundColor Gray
    }
    Write-Host ""
} catch {
    Write-Host "✗ Failed to fetch news: $_" -ForegroundColor Red
}

# Step 4: Create new news (Admin only)
Write-Host "4. Creating new news item (Admin test)..." -ForegroundColor Yellow
try {
    $newNews = @{
        title = "TEST: Admin Created News"
        description = "This news was created via API at $(Get-Date)"
        category = "test"
        is_published = $true
        order = 99
    } | ConvertTo-Json

    $createResponse = Invoke-RestMethod -Uri "$baseUrl/news" `
        -Method POST `
        -Headers @{"Authorization"="Bearer $token"; "Content-Type"="application/json"} `
        -Body $newNews
    
    Write-Host "✓ News created successfully!" -ForegroundColor Green
    Write-Host "ID: $($createResponse.data.id)" -ForegroundColor Gray
    Write-Host "Title: $($createResponse.data.title)" -ForegroundColor Gray
    Write-Host ""
} catch {
    Write-Host "✗ Failed to create news: $_" -ForegroundColor Red
}

# Step 5: Get statistics
Write-Host "5. Fetching statistics..." -ForegroundColor Yellow
try {
    $statsResponse = Invoke-RestMethod -Uri "$baseUrl/statistics" -Method GET
    Write-Host "✓ Found $($statsResponse.data.Count) statistics" -ForegroundColor Green
    foreach ($stat in $statsResponse.data) {
        Write-Host "  - $($stat.label): $($stat.number) ($($stat.period))" -ForegroundColor Gray
    }
    Write-Host ""
} catch {
    Write-Host "✗ Failed to fetch statistics: $_" -ForegroundColor Red
}

# Step 6: Get departments
Write-Host "6. Fetching departments..." -ForegroundColor Yellow
try {
    $deptsResponse = Invoke-RestMethod -Uri "$baseUrl/departments" -Method GET
    Write-Host "✓ Found $($deptsResponse.data.Count) departments" -ForegroundColor Green
    foreach ($dept in $deptsResponse.data) {
        Write-Host "  - [$($dept.id)] $($dept.name): $($dept.full_name)" -ForegroundColor Gray
    }
    Write-Host ""
} catch {
    Write-Host "✗ Failed to fetch departments: $_" -ForegroundColor Red
}

Write-Host "=== Test Complete ===" -ForegroundColor Cyan
Write-Host ""
Write-Host "Your admin token (save this):" -ForegroundColor Yellow
Write-Host $token -ForegroundColor White
