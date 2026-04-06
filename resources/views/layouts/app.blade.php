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
                @auth
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">HOME</a></li>
                    <li><a href="{{ route('computer-parts.index') }}" class="{{ request()->routeIs('computer-parts.index') ? 'active' : '' }}">VIEW RECORDS</a></li>
                    <li><a href="{{ route('computer-parts.create') }}" class="{{ request()->routeIs('computer-parts.create') || request()->routeIs('computer-parts.edit') ? 'active' : '' }}">ADD PART</a></li>
                    
                    @if(auth()->user()->isAdmin())
                        <li><a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">USER MANAGEMENT</a></li>
                    @endif
                    
                    <li class="navbar-user-dropdown" style="margin-left: auto;">
                        <a href="#" class="navbar-user-toggle">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="margin-right: 8px; vertical-align: middle;">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                            {{ Auth::user()->name }}
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor" style="margin-left: 8px; vertical-align: middle;">
                                <path d="M2 4l4 4 4-4z"/>
                            </svg>
                        </a>
                        <div class="navbar-dropdown-menu">
                            <div class="navbar-dropdown-header">
                                <strong>{{ Auth::user()->name }}</strong>
                                <span class="role-badge role-badge-{{ Auth::user()->role }}">
                                    {{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}
                                </span>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="navbar-dropdown-item">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="margin-right: 8px;">
                                        <path d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                        <path d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">LOGIN</a></li>
                    <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">REGISTER</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
