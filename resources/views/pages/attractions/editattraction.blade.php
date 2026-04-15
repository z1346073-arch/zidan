<form action="/categories/{{ $category->id }}/update" method="POST">
    @csrf
    @method('PUT')
    <label>Nama Kategori</label>
    <input type="text" name="name" value="{{ $category->name }}" required>

    <button type="submit">Update</button>
</form>

@extends('master')

@section('content')
    <form action="/users" method="post">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="FloatingInputName" placeholder="Nama Lengkap" name="name" value="{{$user->name}}" required>
        <label for="FloatingInputName">Nama</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="FloatingInputEmail" placeholder="z1346073@gmail.com" name="email" value="{{$user->email}}" required>
        <label for="FloatingInputEmail">Email</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="FloatingInputPassword" placeholder="Password" name="password_confirmation" required>
        <label for="FloatingInputPasswordConfirmation">Confirm Password</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection     



