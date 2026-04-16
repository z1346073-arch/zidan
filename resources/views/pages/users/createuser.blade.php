@extends('master')

@section('content')

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

        
    @endif


    <form action="/users" method="post">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="FloatingInputName" placeholder="Nama Lengkap" name="name" required value="{{ old('name') }}">
        <label for="FloatingInputName">Nama</label>\
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="FloatingInputEmail" placeholder="z1346073@gmail.com" name="email" required value="{{ old('email') }}">
        <label for="FloatingInputEmail">Email</label>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-4">
        <input type="password" class="form-control" id="FloatingInputPassword" placeholder="Password" name="password" required value="{{ old('password') }}">
        <label for="FloatingInputPassword">Password</label>
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection     









