<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Computer Parts Inventory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="split-auth-body">
    <div class="split-auth-container">
        <!-- Left Side - Form -->
        <div class="split-auth-left">
            <div class="split-auth-form-wrapper">
                <h1 class="split-auth-title">Log In</h1>
                
                <form method="POST" action="{{ route('login') }}" class="split-auth-form">
                    @csrf

                    <div class="split-input-group">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                        @error('email')
                            <span class="split-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="split-input-group">
                        <input id="password" type="password" name="password" required placeholder="Password">
                        @error('password')
                            <span class="split-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="split-submit-btn">Log In</button>

                    <div class="split-footer-text">
                        <p>Don't have any account? <a href="{{ route('register') }}">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Side - Image -->
        <div class="split-auth-right">
            <!-- Add your image path in the style below -->
            <div class="split-auth-image" style="background-image: url('/images/auth-background.jpg');">
            </div>
        </div>
    </div>
</body>
</html>
