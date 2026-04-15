@extends('master')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Destinations</h1>
        <a href="{{ route('destinations.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Add Destination
        </a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('destinations.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input 
                type="text" 
                class="form-control" 
                placeholder="Search by name..." 
                name="search" 
                value="{{ request('search') }}"
            >
            <button class="btn btn-outline-secondary" type="submit">
                <i class="bi bi-search"></i> Search
            </button>
        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Hours</th>
                    <th>Days</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($destinations as $destination)
                    <tr>
                        <td>
                            <a href="{{ route('destinations.show', $destination->id) }}" class="text-decoration-none">
                                {{ $destination->id }}
                            </a>
                        </td>
                        <td>{{ $destination->name }}</td>
                        <td>{{ Str::limit($destination->description, 50) }}</td>
                        <td>{{ $destination->location }}</td>
                        <td>{{$destination->ticket_price}}</td>
                        <td>{{ $destination->working_hours }}</td>
                        <td>{{ $destination->working_day }}</td>
                        <td class="text-center">
                            <a 
                                href="{{ route('destinations.edit', $destination->id) }}" 
                                class="btn btn-warning btn-sm"
                                title="Edit"
                            >
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form 
                                action="{{ route('destinations.delete', $destination->id) }}" 
                                method="POST" 
                                style="display: inline-block;"
                                onsubmit="return confirm('Are you sure?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            No destinations found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $destinations->links('pagination::bootstrap-5') }}
    </div>
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: #f9f9f9;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    h1 {
        color: #333;
        font-weight: 600;
    }
</style>

<a href="/categories/create" class="btn btn-primary">Create Category</a>

<form action="/categories/{{ $item->id }}/delete" method="POST"> 
    @csrf
    @method('Delete')
    <button type="submit" 
        onclick="return confirm('Are you sure?{{ $category->name }}')">Delete</button>
</form>
@endsection

















