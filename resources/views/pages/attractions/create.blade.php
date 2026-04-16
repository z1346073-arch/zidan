@extends('master')

@section('content')
<div class="page-title" style="margin-bottom: 2rem;">
    <h1>Tambah Attraction</h1>
    <p>Buat attraction baru untuk destinasi wisata</p>
</div>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger" style="margin-bottom: 1.5rem;">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="flex-shrink: 0;">
                    <circle cx="12" cy="12" r="10"/>
                    <text x="12" y="16" text-anchor="middle" fill="white" font-size="12" font-weight="bold">!</text>
                </svg>
                <div>
                    <strong style="display: block; margin-bottom: 8px;">Terdapat kesalahan:</strong>
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('attractions.store') }}" method="POST">
            @csrf

            <!-- Destination -->
            <div class="form-group">
                <label for="destination_id">Pilih Destinasi <span style="color: var(--danger);">*</span></label>
                <select 
                    id="destination_id" 
                    name="destination_id" 
                    class="form-control @error('destination_id') is-invalid @enderror"
                    required
                >
                    <option value="">-- Pilih Destinasi --</option>
                    @foreach ($destinations as $destination)
                        <option 
                            value="{{ $destination->id }}" 
                            {{ old('destination_id') == $destination->id ? 'selected' : '' }}
                        >
                            {{ $destination->name }}
                        </option>
                    @endforeach
                </select>
                @error('destination_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Attraction -->
            <div class="form-group">
                <label for="name">Nama Attraction <span style="color: var(--danger);">*</span></label>
                <input 
                    type="text" 
                    id="name"
                    name="name" 
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Contoh: Air Terjun Indah"
                    value="{{ old('name') }}"
                    required
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea 
                    id="description"
                    name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Deskripsikan detail attraction ini..."
                    rows="5"
                    style="resize: vertical; padding: 10px;"
                >{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons -->
            <div style="display: flex; gap: 10px; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M17 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/></svg>
                    Simpan Attraction
                </button>
                <a href="{{ route('attractions.index') }}" class="btn btn-ghost">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%237a9bf8' stroke-width='2' viewBox='0 0 24 24'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px;
        padding-right: 36px;
    }

    textarea.form-control {
        font-family: inherit;
        font-size: 0.875rem;
    }

    textarea.form-control:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px var(--accent-glow);
    }

    .form-control.is-invalid {
        border-color: var(--danger);
    }

    .form-control.is-invalid:focus {
        border-color: var(--danger);
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.18);
    }

    .invalid-feedback {
        display: block;
        margin-top: 5px;
    }
</style>

@endsection
