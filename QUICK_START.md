# Quick Start Guide

## Setup Commands (Run in order)

```bash
# 1. Install dependencies
composer install
npm install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Configure database in .env file
# Edit DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 4. Run migrations
php artisan migrate

# 5. Seed test users (optional)
php artisan db:seed

# 6. Start servers
php artisan serve
npm run dev
```

## Test Accounts (after seeding)

- Admin: `admin@example.com` / `password`
- Staff: `staff@example.com` / `password`

## What's Been Implemented

### ✅ Authentication
- Login page at `/login`
- Registration page at `/register`
- Logout functionality
- All routes protected (require login)

### ✅ RBAC (Role-Based Access Control)
- Two roles: `admin` and `inventory_staff`
- Role middleware ready for future modules
- User role displayed in navbar
- Default role: `inventory_staff` for new registrations

### ✅ Your Design Preserved
- No changes to existing page designs
- Minimal navbar updates (login/logout links added)
- Auth pages match your existing style

## Next Steps

When you add new modules, protect them with roles:

```php
// Admin only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('purchases', PurchaseController::class);
});

// Both roles can access
Route::middleware(['auth', 'role:admin,inventory_staff'])->group(function () {
    Route::resource('stock-transactions', StockTransactionController::class);
    Route::resource('reports', ReportController::class);
});
```

## Access the Application

After running `php artisan serve`:
- Visit: http://127.0.0.1:8000
- You'll be redirected to login if not authenticated
- After login, you'll see your home page with inventory stats
