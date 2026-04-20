@extends('master')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Create Destination</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                    <div class="form.floating mb-3">
                        <input type="file" class="form-control" id="floatingInput" placeholder="image" name="image" value="{{ old('image') }}" accept=".jpg,.jpeg,.png">
                        <label for="floatingInput">Gambar Destinasi</label>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                </div>



                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name" value="{{ old('name') }}" required>
                            <label for="floatingInput">Nama Destinasi</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control" id="floatingDescription" placeholder="Description" style="height: 100px;">{{ old('description') }}</textarea>
                            <label for="floatingDescription">Deskripsi</label>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingLocation" placeholder="Pekanbaru" name="location" value="{{ old('location') }}" required>
                            <label for="floatingLocation">Lokasi</label>
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingPrice" placeholder="100000" name="ticket_price" value="{{ old('ticket_price') }}">
                            <label for="floatingPrice">Harga Tiket</label>
                            @error('ticket_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingHours" placeholder="08.00 - 17.00" name="working_hours" value="{{ old('working_hours') }}">
                            <label for="floatingHours">Jam Operasional</label>
                            @error('working_hours')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingDay" placeholder="Senin - Minggu" name="working_day" value="{{ old('working_day') }}">
                            <label for="floatingDay">Hari Operasional</label>
                            @error('working_day')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection