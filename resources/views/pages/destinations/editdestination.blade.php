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




    <form action="/destinations/{{ $destination->id }}/update" method="post" class="form-floating">
    @csrf 
    


    @method("put")
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name"required value="{{ old('name', $destination->name) }}">
        <label for="floatingInput">Nama Destinasi</label>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating">
        <textarea name="description" id="" class="form-control" placeholder="Description">{{ $destination->description }}</textarea>
        <label for="description">Description</label>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Pekanbaru" name="location" required value="{{ old('location', $destination->location) }}">
        <label for="floatingInput">Lokasi</label>
        @error('location')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="100000" name="ticket_price" required value="{{ old('ticket_price', $destination->ticket_price) }}">
        <label for="floatingInput">Harga Tiket</label>
        @error('ticket_price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="08.00 - 17.00" name="working_hours" required value="{{ old('working_hours', $destination->working_hours) }}">
        <label for="floatingInput">Jam Operasional</label>
        @error('working_hours')
            <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Senin - Minggu" name="working_day" required value="{{ old('working_day', $destination->working_day) }}">
        <label for="floatingInput">Hari Operasional</label>
        @error('working_day')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection