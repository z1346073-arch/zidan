<a href="{{ route('attractions.create') }}" class="btn btn-primary mb-3">Create Attraction</a>

<div class="card">
    <div class="card-header">
        <h1>Daftar Attractions</h1>
        <p>berikut adalah daftar attraction yang tersedia :</p>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attractions as $attraction)
                    <tr>
                        <td>{{ $attraction->id }}</td>
                        <td>{{ $attraction->name }}</td>
                        <td>{{ $attraction->description }}</td>
                        <td>
                            <a href="/categories/{{ $attraction->id }}/edit" class="btn btn-sm btn-warning">Edit</a>

                            <form action="/categories/{{ $attraction->id }}/delete" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    onclick="return confirm('Are you sure? {{ $attraction->name }}')"
                                    class="btn btn-sm btn-danger">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No attractions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>  








