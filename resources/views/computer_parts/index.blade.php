@extends('layouts.app')

@section('title', 'View All Parts - Computer Parts Inventory')

@section('content')
    <div class="page-header">
        <h1>Computer Parts Inventory</h1>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="content-box">
        <div style="margin-bottom: 20px;">
            <a href="{{ route('computer-parts.create') }}" class="btn btn-success">+ Add New Computer Part</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Part Name</th>
                        <th>Type</th>
                        <th>Manufacturer</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($parts as $part)
                        <tr>
                            <td>{{ $part->id }}</td>
                            <td>{{ $part->part_name }}</td>
                            <td>{{ $part->part_type }}</td>
                            <td>{{ $part->manufacturer }}</td>
                            <td>₱{{ number_format($part->price, 2) }}</td>
                            <td>{{ $part->quantity }}</td>
                            <td>{{ $part->description ?? 'N/A' }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('computer-parts.edit', $part->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('computer-parts.destroy', $part->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('⚠️ Are you sure you want to delete this computer part?\n\nPart: {{ $part->part_name }}\n\nThis action cannot be undone!')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty-state">
                                <p>No computer parts found in inventory.</p>
                                <a href="{{ route('computer-parts.create') }}" class="btn btn-success" style="margin-top: 15px;">Add Your First Part</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
