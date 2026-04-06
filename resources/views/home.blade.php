@extends('layouts.app')

@section('title', 'Home - Computer Parts Inventory')

@section('content')
    <div class="hero-section home-hero">
        <h1>Computer Parts Inventory</h1>
        <p>Simple tracking for your parts, stock, and value.</p>
        <div class="hero-buttons">
            <a href="{{ route('computer-parts.index') }}" class="btn btn-primary btn-large">View All Parts</a>
            <a href="{{ route('computer-parts.create') }}" class="btn btn-success btn-large">Add New Part</a>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <p class="stat-label">Total Part Records</p>
            <p class="stat-value">{{ number_format($totalParts) }}</p>
        </div>
        <div class="stat-card">
            <p class="stat-label">Total Items In Stock</p>
            <p class="stat-value">{{ number_format($totalQuantity) }}</p>
        </div>
        <div class="stat-card">
            <p class="stat-label">Estimated Inventory Value</p>
            <p class="stat-value">₱{{ number_format($totalValue ?? 0, 2) }}</p>
        </div>
    </div>
@endsection
