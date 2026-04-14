@extends('master')


@section('content')
    <div class="container">
        <div class="mt-4 d-flex justify-content-center">
        {{ $destinations->links('pagination::bootstrap-5') }}
        </div>
        <div class="input-group">
            <form action="/destinations" method="GET">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
        <a href="/destination/create" class="btn btn-primary">Create Destination</a>
        <table class="table table-dark table-striped-columns">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Working Hours</th>
                    <th>Working Days</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($destinations as $d)
                    <tr>
                        <td><a href="detaildestinations/{{ $d->id }}">{{ $d->id }}</a></td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->description }}</td>
                        <td>{{ $d->location }}</td>
                        <td>{{ $d->ticket_price }}</td>
                        <td>{{ $d->working_hours }}</td>
                        <td>{{ $d->working_day }}</td>
                        <td>
                            <a href="/destinations/{{ $d->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/destinations/{{ $d->id }}" method="post" style="display: inline-block">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
