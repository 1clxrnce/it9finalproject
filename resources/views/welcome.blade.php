@extends('layouts.app')

@section('title', 'Welcome - Computer Parts Inventory')

@section('content')
    <div class="hero-section">
        <h1>Welcome to Computer Parts Inventory</h1>
        <p>Manage your computer parts inventory efficiently</p>
        <div class="hero-buttons">
            <a href="{{ route('login') }}" class="btn btn-primary btn-large">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success btn-large">Register</a>
        </div>
    </div>

    <div class="content-box" style="text-align: center; margin-top: 20px;">
        <h2 style="margin-bottom: 15px;">Features</h2>
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 10px;">✓ Track computer parts inventory</li>
            <li style="margin-bottom: 10px;">✓ Manage stock levels</li>
            <li style="margin-bottom: 10px;">✓ Role-based access control</li>
            <li style="margin-bottom: 10px;">✓ Real-time inventory updates</li>
        </ul>
    </div>
@endsection
