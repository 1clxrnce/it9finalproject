# Role-Based Access Control (RBAC) Implementation

## Overview
The system now has complete role-based access control with two roles: Administrator and Inventory Staff.

## Roles and Permissions

### Administrator (admin)
- Full system access
- Can manage users (create, edit, delete, assign roles)
- Can manage computer parts (full CRUD)
- Access to User Management menu
- Red badge in dropdown

### Inventory Staff (inventory_staff)
- Limited system access
- Can manage computer parts (full CRUD)
- Cannot access User Management
- Blue badge in dropdown

## Features Implemented

### 1. Navigation Menu
- **Admin sees**: HOME, VIEW RECORDS, ADD PART, USER MANAGEMENT
- **Staff sees**: HOME, VIEW RECORDS, ADD PART
- Menu items dynamically shown based on role

### 2. User Management Module (Admin Only)
- **Location**: `/users`
- **Features**:
  - View all users
  - Create new users with role assignment
  - Edit existing users (name, email, role, password)
  - Delete users (cannot delete yourself)
  - Role badges with color coding

### 3. Role Middleware
- **File**: `app/Http/Middleware/CheckRole.php`
- **Usage**: Protects routes by role
- **Example**: `Route::middleware(['role:admin'])->group(...)`

### 4. Visual Indicators
- **Role Badges**:
  - Admin: Red gradient badge
  - Inventory Staff: Blue gradient badge
- **Dropdown Menu**: Shows user name and role badge

## Routes

### Public Routes
- `/login` - Login page
- `/register` - Registration page
- `/welcome` - Welcome page

### Authenticated Routes
- `/` - Home (dashboard)
- `/computer-parts` - View all parts (both roles)
- `/computer-parts/create` - Add new part (both roles)
- `/computer-parts/{id}/edit` - Edit part (both roles)

### Admin Only Routes
- `/users` - User management index
- `/users/create` - Create new user
- `/users/{id}/edit` - Edit user
- `/users/{id}` - Delete user

## Testing

### Test Accounts
1. **Admin Account**
   - Email: admin@example.com
   - Password: password
   - Can access all features

2. **Staff Account**
   - Email: staff@example.com
   - Password: password
   - Limited access (no user management)

### Test Scenarios

#### As Admin:
1. Login with admin account
2. Navigate to "USER MANAGEMENT" in navbar
3. Create a new user with any role
4. Edit existing users
5. Delete users (except yourself)
6. See red "Administrator" badge in dropdown

#### As Inventory Staff:
1. Login with staff account
2. Notice "USER MANAGEMENT" is not in navbar
3. Try to access `/users` directly → Should get 403 error
4. Can still manage computer parts
5. See blue "Inventory Staff" badge in dropdown

## Security Features

1. **Middleware Protection**: Routes protected by role middleware
2. **Self-Delete Prevention**: Users cannot delete their own account
3. **Password Hashing**: All passwords securely hashed
4. **Email Uniqueness**: Prevents duplicate email addresses
5. **Role Validation**: Only valid roles (admin, inventory_staff) allowed

## Future Enhancements

Ready to add:
- Purchasing Module (Admin only)
- Stock Transactions Module (Both roles)
- Reports Module (Both roles with different access levels)
- Suppliers Management (Admin only)
- Activity Logs (Admin only)

## Code Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── UserController.php (User CRUD)
│   │   └── ComputerPartController.php
│   └── Middleware/
│       └── CheckRole.php (Role verification)
├── Models/
│   └── User.php (isAdmin(), isInventoryStaff() methods)
resources/
└── views/
    ├── users/
    │   ├── index.blade.php (User list)
    │   ├── create.blade.php (Create user)
    │   └── edit.blade.php (Edit user)
    └── layouts/
        └── app.blade.php (Navbar with role-based menu)
routes/
└── web.php (Role-protected routes)
```

## Customization

### Adding New Roles
1. Update User model with new role methods
2. Add role to validation rules
3. Create role badge CSS
4. Update navbar conditions
5. Add role-specific routes

### Adding New Admin-Only Features
```php
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('new-feature', NewFeatureController::class);
});
```

### Adding Features for Both Roles
```php
Route::middleware(['auth', 'role:admin,inventory_staff'])->group(function () {
    Route::resource('shared-feature', SharedFeatureController::class);
});
```
