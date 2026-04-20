@extends('master')

@section('content')

<div class="container-fluid py-0">
    <!-- Header Section -->
    <div class="bg-dark p-5 mb-5" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%) !important;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-4 fw-bold text-white mb-0">
                    <i class="bi bi-pencil-square me-2"></i>Edit Destinasi
                </h1>
                <a href="{{ route('destinations.index') }}" class="btn btn-outline-light btn-lg">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <!-- Error Messages -->
                @if($errors->any())
                    <div class="alert alert-danger border-0 mb-4" style="background: rgba(220, 53, 69, 0.15); border-left: 4px solid #dc3545;">
                        <h6 class="text-white fw-bold mb-3">
                            <i class="bi bi-exclamation-circle me-2"></i>Terjadi Kesalahan:
                        </h6>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li class="text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Card -->
                <div class="card border-0 shadow-xl" style="background: rgba(26, 26, 46, 0.8); border-radius: 20px;">
                    <div class="card-body p-5">

                        <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Image Upload -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-white mb-3">
                                    <i class="bi bi-image me-2"></i>Gambar Destinasi
                                </label>
                                <div class="input-group input-group-lg">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image" accept=".jpg,.jpeg,.png" style="background: rgba(255, 255, 255, 0.08); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1);">
                                </div>
                                @if($destination->image)
                                    <small class="d-block mt-2 text-white">
                                        <i class="bi bi-info-circle me-2"></i>Gambar saat ini: <strong>{{ $destination->image }}</strong>
                                    </small>
                                @endif
                                @error('image')
                                    <div class="text-danger small mt-2">
                                        <i class="bi bi-x-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Nama Destinasi -->
                            <div class="mb-4">
                                <label for="nameInput" class="form-label fw-bold text-white mb-3">
                                    <i class="bi bi-pin-map me-2"></i>Nama Destinasi
                                </label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="nameInput" name="name" placeholder="Masukkan nama destinasi" required value="{{ old('name', $destination->name) }}" style="background: rgba(255, 255, 255, 0.08); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1);">
                                @error('name')
                                    <div class="text-danger small mt-2">
                                        <i class="bi bi-x-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Lokasi -->
                            <div class="mb-4">
                                <label for="locationInput" class="form-label fw-bold text-white mb-3">
                                    <i class="bi bi-geo-alt me-2"></i>Lokasi
                                </label>
                                <input type="text" class="form-control form-control-lg @error('location') is-invalid @enderror" id="locationInput" name="location" placeholder="Masukkan lokasi" required value="{{ old('location', $destination->location) }}" style="background: rgba(255, 255, 255, 0.08); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1);">
                                @error('location')
                                    <div class="text-danger small mt-2">
                                        <i class="bi bi-x-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-4">
                                <label for="descriptionInput" class="form-label fw-bold text-white mb-3">
                                    <i class="bi bi-file-text me-2"></i>Deskripsi
                                </label>
                                <textarea name="description" id="descriptionInput" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Masukkan deskripsi destinasi" style="background: rgba(255, 255, 255, 0.08); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1); resize: vertical;">{{ old('description', $destination->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger small mt-2">
                                        <i class="bi bi-x-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Harga Tiket -->
                            <div class="mb-4">
                                <label for="priceInput" class="form-label fw-bold text-white mb-3">
                                    <i class="bi bi-cash-coin me-2"></i>Harga Tiket (Rp)
                                </label>
                                <input type="number" class="form-control form-control-lg @error('ticket_price') is-invalid @enderror" id="priceInput" name="ticket_price" placeholder="Masukkan harga tiket" required value="{{ old('ticket_price', $destination->ticket_price) }}" style="background: rgba(255, 255, 255, 0.08); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1);">
                                @error('ticket_price')
                                    <div class="text-danger small mt-2">
                                        <i class="bi bi-x-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Jam Operasional -->
                            <div class="mb-4">
                                <label for="hoursInput" class="form-label fw-bold text-white mb-3">
                                    <i class="bi bi-clock me-2"></i>Jam Operasional
                                </label>
                                <input type="text" class="form-control form-control-lg @error('working_hours') is-invalid @enderror" id="hoursInput" name="working_hours" placeholder="Contoh: 08:00 - 17:00" required value="{{ old('working_hours', $destination->working_hours) }}" style="background: rgba(255, 255, 255, 0.08); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1);">
                                @error('working_hours')
                                    <div class="text-danger small mt-2">
                                        <i class="bi bi-x-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Hari Operasional -->
                            <div class="mb-5">
                                <label for="daysInput" class="form-label fw-bold text-white mb-3">
                                    <i class="bi bi-calendar3 me-2"></i>Hari Operasional
                                </label>
                                <input type="text" class="form-control form-control-lg @error('working_days') is-invalid @enderror" id="daysInput" name="working_days" placeholder="Contoh: Senin - Minggu" required value="{{ old('working_days', $destination->working_days) }}" style="background: rgba(255, 255, 255, 0.08); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1);">
                                @error('working_days')
                                    <div class="text-danger small mt-2">
                                        <i class="bi bi-x-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-3 pt-4 border-top border-secondary">
                                <a href="{{ route('destinations.index') }}" class="btn btn-secondary btn-lg flex-grow-1" style="border-radius: 10px; font-weight: 600;">
                                    <i class="bi bi-x-circle me-2"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg flex-grow-1" style="border-radius: 10px; font-weight: 600;">
                                    <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
    body {
        background-color: #0f0f1e;
        color: #ffffff;
    }

    /* Form styling */
    .form-control {
        transition: all 0.3s ease;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.12) !important;
        color: #ffffff;
        border-color: rgba(0, 123, 255, 0.5) !important;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .form-label {
        color: #ffffff;
        font-size: 1rem;
    }

    /* Input group */
    .input-group-lg .form-control {
        padding: 0.75rem 1rem;
        font-size: 1.1rem;
    }

    /* Card styling */
    .card {
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
    }

    .card-body {
        color: #ffffff;
    }

    /* Alert styling */
    .alert {
        border-radius: 10px;
    }

    /* Buttons */
    .btn {
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.4);
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }

    .btn-outline-light {
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.5);
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        border-color: #ffffff;
    }

    /* Borders */
    .border-secondary {
        border-color: rgba(255, 255, 255, 0.15) !important;
    }

    /* Text colors */
    .text-white {
        color: #ffffff !important;
    }

    .text-danger {
        color: #ff6b6b !important;
    }

    /* Invalid feedback */
    .is-invalid {
        border-color: #ff6b6b !important;
    }

    /* Header styling */
    .display-4 {
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    }

    /* Scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #0f0f1e;
    }

    ::-webkit-scrollbar-thumb {
        background: #404050;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #606070;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 1.8rem !important;
        }

        .d-flex {
            flex-direction: column;
        }

        .btn-lg {
            width: 100%;
        }
    }
</style>
@endpush

@endsection