@extends('master')

@section('content')
<div class="page-title" style="margin-bottom: 2rem;">
    <h1>{{ $attraction->name }}</h1>
    <p>Detail informasi attraction wisata</p>
</div>

<div class="card" style="max-width: 700px;">
    <div class="card-body">
        <!-- Destination -->
        @if($attraction->destination)
            <div class="detail-row">
                <div class="detail-label">📍 Destinasi</div>
                <div class="detail-value">
                    <strong>{{ $attraction->destination->name }}</strong>
                </div>
            </div>
        @endif

        <!-- Nama -->
        <div class="detail-row">
            <div class="detail-label">🎯 Nama Attraction</div>
            <div class="detail-value">
                <strong>{{ $attraction->name }}</strong>
            </div>
        </div>

        <!-- Deskripsi -->
        @if($attraction->description)
            <div class="detail-row">
                <div class="detail-label">📝 Deskripsi</div>
                <div class="detail-value">
                    {{ $attraction->description }}
                </div>
            </div>
        @endif

        <!-- Created -->
        <div class="detail-row">
            <div class="detail-label">⏰ Dibuat</div>
            <div class="detail-value">
                {{ $attraction->created_at ? $attraction->created_at->format('d M Y H:i') : '-' }}
            </div>
        </div>

        <!-- Updated -->
        <div class="detail-row">
            <div class="detail-label">🔄 Diperbarui</div>
            <div class="detail-value">
                {{ $attraction->updated_at ? $attraction->updated_at->format('d M Y H:i') : '-' }}
            </div>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div style="display: flex; gap: 10px; margin-top: 2rem; max-width: 700px;">
    <a href="{{ route('attractions.index') }}" class="btn btn-ghost">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Kembali
    </a>
    <a href="{{ route('attractions.edit', $attraction->id) }}" class="btn btn-warning">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        Edit
    </a>
    <form action="{{ route('attractions.delete', $attraction->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus {{ $attraction->name }}?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
            Hapus
        </button>
    </form>
</div>

@endsection