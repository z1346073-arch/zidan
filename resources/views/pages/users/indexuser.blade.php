@extends('master')

@section('content')
<div class="container-fluid py-4 px-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div>
                <h1 class="fw-bold mb-2" style="font-size: 2rem; color: #2c3e50;">
                    <i class="bi bi-people-fill" style="color: #007bff;"></i> Daftar User
                </h1>
                <p class="text-muted">Kelola semua pengguna sistem Anda di sini</p>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-start">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle"></i> Tambah User
            </a>
        </div>
    </div>

    <!-- Card Wrapper -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <!-- Search Form -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <form action="{{ route('users.index') }}" method="GET" class="d-flex gap-2">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input 
                                type="text" 
                                class="form-control border-start-0" 
                                placeholder="Cari nama atau email..." 
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
                            <th class="fw-600" style="color: #2c3e50;">Email</th>
                            <th class="fw-600" style="color: #2c3e50;">Terdaftar</th>
                            <th class="fw-600 text-center" style="color: #2c3e50;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key => $user)
                            <tr style="border-bottom: 1px solid #e9ecef;">
                                <td>
                                    <span class="badge bg-light text-dark">{{ ($users->currentPage() - 1) * $users->perPage() + $key + 1 }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm me-3">
                                            <span class="badge rounded-circle" style="background-color: #007bff; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </span>
                                        </div>
                                        <div>
                                            <a href="{{ route('users.show', $user->id) }}" class="text-decoration-none fw-500 d-block" style="color: #007bff;">
                                                {{ $user->name }}
                                            </a>
                                            <small class="text-muted">
                                                <i class="bi bi-envelope"></i> {{ $user->email }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td class="d-none d-lg-table-cell">
                                    <a href="mailto:{{ $user->email }}" class="text-decoration-none" style="color: #666;">
                                        {{ $user->email }}
                                    </a>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar"></i> 
                                        {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a 
                                            href="{{ route('users.show', $user->id) }}" 
                                            class="btn btn-outline-info"
                                            title="Lihat Detail"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a 
                                            href="{{ route('users.edit', $user->id) }}" 
                                            class="btn btn-outline-warning"
                                            title="Edit"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form 
                                            action="{{ route('users.delete', $user->id) }}" 
                                            method="POST" 
                                            style="display: inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus {{ $user->name }}?')"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div style="color: #999;">
                                        <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                                        <p class="mt-3 mb-0">Tidak ada user yang ditemukan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($users->hasPages())
                <div class="d-flex justify-content-center align-items-center mt-4">
                    {{ $users->appends(request()->query())->links('pagination::bootstrap-5') }}
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

    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
    }

    .btn-outline-info:hover, 
    .btn-outline-warning:hover, 
    .btn-outline-danger:hover {
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

    .avatar-sm span {
        font-weight: 600;
        font-size: 0.875rem;
    }

    @media (max-width: 768px) {
        .d-none.d-md-table-cell {
            display: none !important;
        }
    }
</style>

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










