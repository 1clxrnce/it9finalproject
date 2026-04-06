# How to Add Your Image to Login/Register Pages

## Step 1: Add Your Image

Place your image in the `public/images/` folder. For example:
- `public/images/auth-background.jpg`
- `public/images/login-bg.png`
- `public/images/welcome.jpg`

## Step 2: Update the Image Path

### For Login Page
Edit `resources/views/auth/login.blade.php` and change this line:
```html
<div class="split-auth-image" style="background-image: url('/images/auth-background.jpg');">
```

Replace `/images/auth-background.jpg` with your image path.

### For Register Page
Edit `resources/views/auth/register.blade.php` and change the same line.

## Step 3: Remove Text Overlay (Optional)

If you want ONLY the image without the "WELCOME!" text:

### Option A: Remove the overlay div
Delete or comment out this section in both login.blade.php and register.blade.php:
```html
<!-- Remove this entire section -->
<div class="split-image-overlay">
    <h2>WELCOME!</h2>
    <p>Log in to continue</p>
</div>
```

### Option B: Keep the overlay but customize it
Edit the text inside the overlay:
```html
<div class="split-image-overlay">
    <h2>Your Title Here</h2>
    <p>Your subtitle here</p>
</div>
```

## Examples

### Example 1: Just image, no text
```html
<div class="split-auth-image" style="background-image: url('/images/my-image.jpg');">
    <!-- No overlay div here -->
</div>
```

### Example 2: Image with custom text
```html
<div class="split-auth-image" style="background-image: url('/images/my-image.jpg');">
    <div class="split-image-overlay">
        <h2>Computer Parts</h2>
        <p>Inventory Management System</p>
    </div>
</div>
```

### Example 3: Different images for login and register
Login page:
```html
<div class="split-auth-image" style="background-image: url('/images/login-bg.jpg');">
```

Register page:
```html
<div class="split-auth-image" style="background-image: url('/images/register-bg.jpg');">
```

## Image Recommendations

- **Size**: At least 1920x1080px for best quality
- **Format**: JPG, PNG, or WebP
- **Aspect Ratio**: Portrait or square works best
- **File Size**: Keep under 500KB for fast loading

## Current Setup

Right now, the pages are set to use `/images/auth-background.jpg`. 
If this file doesn't exist, you'll see a gray background.

Simply add your image to `public/images/` and update the path!
