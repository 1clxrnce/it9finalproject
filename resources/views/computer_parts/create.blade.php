@extends('layouts.app')

@section('title', 'Add New Part - Computer Parts Inventory')

@section('content')
    <div class="page-header">
        <h1>Add New Computer Part</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-error">
            <strong>Please fix the following errors:</strong>
            <ul style="margin-top: 10px; margin-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="content-box">
        <form action="{{ route('computer-parts.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="part_name">Part Name *</label>
                <input type="text" id="part_name" name="part_name" value="{{ old('part_name') }}" placeholder="e.g., Intel Core i7-12700K" required>
            </div>
            
            <div class="form-group">
                <label for="part_type">Part Type *</label>
                <select id="part_type" name="part_type" required>
                    <option value="">-- Select Type --</option>
                    <option value="CPU" {{ old('part_type') == 'CPU' ? 'selected' : '' }}>CPU (Processor)</option>
                    <option value="GPU" {{ old('part_type') == 'GPU' ? 'selected' : '' }}>GPU (Graphics Card)</option>
                    <option value="RAM" {{ old('part_type') == 'RAM' ? 'selected' : '' }}>RAM (Memory)</option>
                    <option value="Motherboard" {{ old('part_type') == 'Motherboard' ? 'selected' : '' }}>Motherboard</option>
                    <option value="Storage" {{ old('part_type') == 'Storage' ? 'selected' : '' }}>Storage (SSD/HDD)</option>
                    <option value="Power Supply" {{ old('part_type') == 'Power Supply' ? 'selected' : '' }}>Power Supply</option>
                    <option value="Case" {{ old('part_type') == 'Case' ? 'selected' : '' }}>Case</option>
                    <option value="Cooling" {{ old('part_type') == 'Cooling' ? 'selected' : '' }}>Cooling</option>
                    <option value="Other" {{ old('part_type') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="manufacturer">Manufacturer *</label>
                <input type="text" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" placeholder="e.g., Intel, AMD, NVIDIA" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price (₱) *</label>
                <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price') }}" placeholder="0.00" required>
            </div>
            
            <div class="form-group">
                <label for="quantity">Quantity *</label>
                <input type="number" id="quantity" name="quantity" min="0" value="{{ old('quantity') }}" placeholder="0" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Additional details about the part...">{{ old('description') }}</textarea>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Add Computer Part</button>
                <a href="{{ route('computer-parts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
