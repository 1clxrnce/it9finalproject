# Authentication Setup Instructions

## Installation Steps

Run these commands in order:

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Configure Database
Edit `.env` file and set your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Seed Database (Optional - Creates test users)
```bash
php artisan db:seed
```

This creates two test accounts:
- Admin: admin@example.com / password
- Staff: staff@example.com / password

### 6. Start Development Servers
```bash
php artisan serve
npm run dev
```

## Features Implemented

### Authentication
- ✅ Login page
- ✅ Registration page
- ✅ Logout functionality
- ✅ Protected routes (requires login)
- ✅ Session management

### Role-Based Access Control (RBAC)
- ✅ Two roles: Admin and Inventory Staff
- ✅ Role stored in users table
- ✅ Role middleware for route protection
- ✅ User role displayed in navbar

### Current Access Control
- All authenticated users can access:
  - Home page
  - View computer parts
  - Add computer parts
  - Edit computer parts
  - Delete computer parts

### Ready for Future Modules
The RBAC system is ready to restrict access when you add:
- User Management Module (Admin only)
- Purchasing Module (Admin only)
- Stock Transaction Module (Both roles)
- Reporting Module (Both roles)

## Usage

### Protecting Routes by Role
To restrict a route to specific roles, use the `role` middleware:

```php
// Admin only
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

// Admin or Inventory Staff
Route::middleware(['auth', 'role:admin,inventory_staff'])->group(function () {
    Route::resource('stock-transactions', StockTransactionController::class);
});
```

### Checking Roles in Controllers
```php
if (auth()->user()->isAdmin()) {
    // Admin-specific logic
}

if (auth()->user()->isInventoryStaff()) {
    // Staff-specific logic
}
```

### Checking Roles in Views
```blade
@if(auth()->user()->isAdmin())
    <a href="{{ route('users.index') }}">Manage Users</a>
@endif
```

## Default User Roles

When users register, they are assigned the `inventory_staff` role by default.
To create an admin user, you can:
1. Use the database seeder
2. Manually update the role in the database
3. Create an admin registration form (future enhancement)
