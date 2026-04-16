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




<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Attraction</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('attractions.update', $attraction->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="FloatingInputName" placeholder="Attraction Name" name="name" required value="{{ old('name', $attraction->name) }}">
                            <label for="FloatingInputName">Nama Attraction</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>

                            @enderror
                        
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="FloatingInputDescription" placeholder="Description" name="description" required>{{ old('description', $attraction->description) }}</textarea>
                            <label for="FloatingInputDescription">Deskripsi</label>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('attractions.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection     



