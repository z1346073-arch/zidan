@extends('master')

@section('content')
<div class="container-fluid py-4 px-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div>
                <h1 class="fw-bold mb-2" style="font-size: 2rem; color: #2c3e50;">
                    <i class="bi bi-geo-alt-fill" style="color: #007bff;"></i> Daftar Destinasi
                </h1>
                <p class="text-muted">Kelola semua destinasi wisata Anda di sini</p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-start">
            <a href="{{ route('destinations.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle"></i> Tambah Destinasi
            </a>
        </div>
    </div>

    <!-- Card Wrapper -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <!-- Search Form -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <form action="{{ route('destinations.index') }}" method="GET" class="d-flex gap-2">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input 
                                type="text" 
                                class="form-control border-start-0" 
                                placeholder="Cari nama destinasi..." 
                                name="search" 
                                value="{{ request('search') }}"
                            >
                            <button class="btn btn-primary" type="submit">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light border-top border-bottom">
                        <tr>
                            <th class="fw-600" style="color: #2c3e50;">No</th>
                            <th class="fw-600" style="color: #2c3e50;">Nama</th>
                            <th class="fw-600" style="color: #2c3e50;">Lokasi</th>
                            <th class="fw-600" style="color: #2c3e50;">Harga Tiket</th>
                            <th class="fw-600" style="color: #2c3e50;">Jam Operasional</th>
                            <th class="fw-600 text-center" style="color: #2c3e50;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($destinations as $key => $destination)
                            <tr style="border-bottom: 1px solid #e9ecef;">
                                <td>
                                    <span class="badge bg-light text-dark">{{ ($destinations->currentPage() - 1) * $destinations->perPage() + $key + 1 }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('destinations.show', $destination->id) }}" class="text-decoration-none fw-500" style="color: #007bff;">
                                        {{ $destination->name }}
                                    </a>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($destination->description ?? 'Deskripsi tidak tersedia', 40) }}</small>
                                </td>
                                <td>
                                    <i class="bi bi-geo-alt"></i> {{ $destination->location ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success fw-600">
                                       Rp {{ number_format((int) ($destination->ticket_price ?? 0), 0, ',', '.') }}
                                    </span>
                                </td>
                                <td>
                                    <small>
                                        <i class="bi bi-clock"></i> {{ $destination->working_hours ?? '-' }}<br>
                                        <i class="bi bi-calendar"></i> {{ $destination->working_day ?? '-' }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a 
                                            href="{{ route('destinations.show', $destination->id) }}" 
                                            class="btn btn-sm btn-outline-info"
                                            title="Lihat Detail"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a 
                                            href="{{ route('destinations.edit', $destination->id) }}" 
                                            class="btn btn-sm btn-outline-warning"
                                            title="Edit"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form 
                                            action="{{ route('destinations.delete', $destination->id) }}" 
                                            method="POST" 
                                            style="display: inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus {{ $destination->name }}?')"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div style="color: #999;">
                                        <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                                        <p class="mt-3 mb-0">Tidak ada destinasi yang ditemukan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($destinations->hasPages())
                <div class="d-flex justify-content-center align-items-center mt-4">
                    {{ $destinations->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-weight: 500;
    }

    .fw-600 {
        font-weight: 600;
    }

    .fw-500 {
        font-weight: 500;
    }

    .card {
        border-radius: 8px;
        transition: box-shadow 0.3s ease;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
    }

    .btn-outline-info:hover, .btn-outline-warning:hover, .btn-outline-danger:hover {
        transform: translateY(-2px);
        transition: transform 0.2s ease;
    }

    .input-group-text {
        border: 1px solid #dee2e6;
    }

    .form-control {
        border: 1px solid #dee2e6;
        border-radius: 4px;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    h1 {
        letter-spacing: -0.5px;
    }

    .badge {
        padding: 0.35rem 0.65rem;
        border-radius: 4px;
    }
</style>

@endsection

















