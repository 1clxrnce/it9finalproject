<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Computer Parts Inventory')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <ul class="navbar-menu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('computer-parts.index') }}" class="{{ request()->routeIs('computer-parts.index') ? 'active' : '' }}">View Records</a></li>
                <li><a href="{{ route('computer-parts.create') }}" class="{{ request()->routeIs('computer-parts.create') ? 'active' : '' }}">Add Part</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
