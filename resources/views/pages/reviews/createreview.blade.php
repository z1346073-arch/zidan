@extends('master')

@section('content')
<div class="page-title" style="margin-bottom: 2rem;">
    <h1>Tambah Review</h1>
    <p>Buat review baru untuk attraction</p>
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

        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf

            <!-- Attraction -->
            <div class="form-group">
                <label for="attraction_id">Pilih Attraction <span style="color: var(--danger);">*</span></label>
                <select 
                    id="attraction_id" 
                    name="attraction_id" 
                    class="form-control @error('attraction_id') is-invalid @enderror"
                    required
                >
                    <option value="">-- Pilih Attraction --</option>
                    @foreach ($attractions as $attraction)
                        <option 
                            value="{{ $attraction->id }}" 
                            {{ old('attraction_id') == $attraction->id ? 'selected' : '' }}
                        >
                            {{ $attraction->name }}
                        </option>
                    @endforeach
                </select>
                @error('attraction_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Reviewer -->
            <div class="form-group">
                <label for="reviewer_name">Nama Reviewer <span style="color: var(--danger);">*</span></label>
                <input 
                    type="text" 
                    id="reviewer_name"
                    name="reviewer_name" 
                    class="form-control @error('reviewer_name') is-invalid @enderror"
                    placeholder="Contoh: John Doe"
                    value="{{ old('reviewer_name') }}"
                    required
                >
                @error('reviewer_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Komentar -->
            <div class="form-group">
                <label for="comment">Komentar <span style="color: var(--danger);">*</span></label>
                <textarea 
                    id="comment"
                    name="comment"
                    class="form-control @error('comment') is-invalid @enderror"
                    placeholder="Berikan komentar atau ulasan Anda tentang attraction ini..."
                    rows="5"
                    style="resize: vertical; padding: 10px;"
                    required
                >{{ old('comment') }}</textarea>
                @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons -->
            <div style="display: flex; gap: 10px; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M17 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/></svg>
                    Simpan Review
                </button>
                <a href="{{ route('reviews.index') }}" class="btn btn-ghost">
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
