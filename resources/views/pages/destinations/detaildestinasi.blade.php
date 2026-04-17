@extends('master')

@section('content')
<div cllass="container card">

    <div class="card-body">
        <a href="{{ route('destinations.edit', $destinations->id) }}" class="btn btn-primary align-self-end">Edit Destinasi</a>
        <img src="{{ asset('storage/image/' . $destinations->image) }}" alt="{{ $destination->name }}" class="img-fluid">
            <h1>{{ $destination->name }}</h1>
            <p>{{ $destination->description }}</p>
            <p>Location: {{ $destination->location }}</p>
            <p>Working Days: {{ $destination->working_days }}</p>
            <p>Working Hours: {{ $destination->working_hours }}</p>
            <p>Ticket Price: Rp {{ $destination->ticket_price }}</p>
    </div>
</div>
@endsection



<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <h1 class="card-title mb-4 text-center">
                        <i class="bi bi-map-fill"></i> Detail Destinasi
                    </h1>

                    <div class="destination-info">
                        <div class="mb-4 pb-3 border-bottom">
                            <label class="label-info">Nama Destinasi</label>
                            <p class="fs-5 fw-normal">{{ $destinations->name }}</p>
                        </div>

                        <div class="mb-4 pb-3 border-bottom">
                            <label class="label-info">Lokasi</label>
                            <p class="fs-5 fw-normal">
                                <i class="bi bi-geo-alt-fill"></i> 
                                {{ $destinations->location }}
                            </p>
                        </div>

                        <div class="mb-4 pb-3 border-bottom">
                            <label class="label-info">Deskripsi</label>
                            <p class="fs-5 fw-normal">{{ $destinations->description ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4 pb-3 border-bottom">
                            <label class="label-info">Harga Tiket</label>
                            <p class="fs-5 fw-normal">
                                <i class="bi bi-ticket-fill"></i> 
                                Rp {{ number_format($destinations->ticket_price, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="mb-4 pb-3 border-bottom">
                            <label class="label-info">Jam Operasional</label>
                            <p class="fs-5 fw-normal">
                                <i class="bi bi-clock-fill"></i> 
                                {{ $destinations->working_hours ?? 'N/A' }}
                            </p>
                        </div>

                        <div class="mb-4">
                            <label class="label-info">Hari Operasional</label>
                            <p class="fs-5 fw-normal">
                                <i class="bi bi-calendar3-fill"></i> 
                                {{ $destinations->working_day ?? 'N/A' }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-center mt-5 flex-wrap">
                        <a href="{{ route('destinations.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('destinations.edit', $destinations->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('destinations.delete', $destinations->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.95);
    }

    .card-body {
        background-color: #fff;
    }

    .destination-info p {
        color: #333;
        margin: 0;
    }

    .label-info {
        font-size: 0.95rem;
        color: #6c757d;
        font-weight: 600;
        display: block;
        margin-bottom: 0.5rem;
    }

    .btn {
        white-space: nowrap;
    }
</style>
@endsection