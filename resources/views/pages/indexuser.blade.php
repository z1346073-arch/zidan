@extends('master')


@section('content')
    <div class="container">
        <div class="mt-4 d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
        <div class="input-group">
            <form action="/users" method="GET">
                <input type="text" class="form-control" placeholder="Search..." name="search"
                    value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
        <a href="/users/create" class="btn btn-primary">Create User</a>
        <table class="table table-dark table-striped-columns">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td> <!-- BENAR -->
                        <td><?= $user['password'] ?></td> <!-- BENAR -->
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="/users/{{ $user->id }}" class="btn btn-info btn-sm text-white">Lihat</a>
                                <a href="/users/{{ $user->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/users/{{ $user->id }}" method="post" style="display: inline;">

                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?{{ $user->name }}')">Delete</button>

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let alertElement = document.querySelector('.alert');
            if (alertElement) {
                setTimeout(() => {
                    alertElement.style.transition = "opacity 1s ease-out";
                    alertElement.style.opacity = "0";
                    setTimeout(() => {
                        alertElement.remove();
                    }, 1000);
                }, 3000);
            }
        })
    </script>
@endpush










