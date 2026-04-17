@extends('master')

@section('content')
<style>
    .attraction-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        padding: 3rem 2rem;
        margin-bottom: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
    }
    
    /* Overlay gelap untuk readability */
    .attraction-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }
    
    .attraction-header h1 {
        margin: 0;
        font-size: 2.5rem;
        font-weight: 700;
        position: relative;
        z-index: 2;
    }
    
    .attraction-header p {
        margin: 0.5rem 0 0 0;
        font-size: 1rem;
        opacity: 0.95;
        position: relative;
        z-index: 2;
    }
    
    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 1rem 0;
        border-bottom: 1px solid #e9ecef;
        gap: 2rem;
    }
    
    .detail-row:last-child {
        border-bottom: none;
    }
    
    .detail-label {
        font-weight: 700;
        color: #ffffff;
        min-width: 150px;
        font-size: 1.05rem;
    }
    
    .detail-value {
        flex: 1;
        color: #ffffff;
        text-align: right;
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .id-badge {
        background: #667eea;
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    .card-header-custom {
        font-size: 1.5rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #667eea;
    }
    
    .action-buttons {
        display: flex;
        gap: 12px;
        margin-top: 2rem;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 0.95rem;
    }
    
    .btn-ghost {
        background: #f8f9fa;
        color: #667eea;
        border: 2px solid #667eea;
    }
    
    .btn-ghost:hover {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
    }
    
    .btn-warning {
        background: #ffc107;
        color: #212529;
        border: 2px solid #ffc107;
    }
    
    .btn-warning:hover {
        background: #ffb300;
        border-color: #ffb300;
        transform: translateY(-2px);
    }
    
    .btn-danger {
        background: #dc3545;
        color: white;
        border: 2px solid #dc3545;
        padding: 0.75rem 1.5rem;
    }
    
    .btn-danger:hover {
        background: #c82333;
        border-color: #c82333;
        transform: translateY(-2px);
    }
    
    .detail-card {
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        
    }
</style>

<div class="attraction-header">
    <h1>Review - {{ $review->reviewer_name }}</h1>
    <p>⭐ Detail informasi review wisata</p>
</div>

<div style="max-width: 800px; margin: 0 auto;">
    <!-- Summary Card -->
    <div class="card detail-card" style="margin-bottom: 2rem;">
        <div class="card-body">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <h6 style="color: #ffffff; font-weight: 700; margin-bottom: 0.5rem; font-size: 1rem;">Nama Reviewer</h6>
                    <p style="font-size: 1.3rem; color: #ffffff; margin: 0; font-weight: 700;">{{ $review->reviewer_name }}</p>
                </div>
                @if($review->attraction)
                <div>
                    <h6 style="color: #ffffff; font-weight: 700; margin-bottom: 0.5rem; font-size: 1rem;">Attraction</h6>
                    <p style="font-size: 1.3rem; color: #ffffff; margin: 0; font-weight: 700;">{{ $review->attraction->name }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Detail Information Card -->
    <div class="card detail-card" style="margin-bottom: 2rem;">
        <div class="card-body">
            <div class="card-header-custom" style="color: #ffffff; font-size: 1.6rem;">
                📋 Detail Review
            </div>

            <div class="detail-row">
                <div class="detail-label">ID</div>
                <div class="detail-value"><span class="id-badge">{{ $review->id }}</span></div>
            </div>

            <div class="detail-row">
                <div class="detail-label">👤 Nama Reviewer</div>
                <div class="detail-value">
                    <strong>{{ $review->reviewer_name }}</strong>
                </div>
            </div>

            @if($review->attraction)
                <div class="detail-row">
                    <div class="detail-label">🎯 Attraction</div>
                    <div class="detail-value">
                        <strong>{{ $review->attraction->name }}</strong>
                    </div>
                </div>
            @endif

        <!-- Komentar -->
        @if($review->comment)
            <div class="detail-row">
                <div class="detail-label">💬 Komentar</div>
                <div class="detail-value" style="text-align: left;">
                    <p style="margin: 0; line-height: 1.8; color: #ffffff; font-size: 1.1rem; font-weight: 500;">{{ $review->comment }}</p>
                </div>
            </div>
        @else
            <div class="detail-row">
                <div class="detail-label">💬 Komentar</div>
                <div class="detail-value" style="color: #ffffff; font-size: 1.1rem;">
                    <em>Tidak ada komentar</em>
                </div>
            </div>
        @endif

        <!-- Created -->
        <div class="detail-row">
            <div class="detail-label">✨ Dibuat</div>
            <div class="detail-value">
                <span style="background: #0066cc; color: #ffffff; padding: 0.5rem 1rem; border-radius: 6px; font-size: 1rem; font-weight: 600;">
                    {{ $review->created_at ? $review->created_at->format('d M Y H:i') : '-' }}
                </span>
            </div>
        </div>

        <!-- Updated -->
        <div class="detail-row">
            <div class="detail-label">🔄 Diperbarui</div>
            <div class="detail-value">
                <span style="background: #ff9900; color: #ffffff; padding: 0.5rem 1rem; border-radius: 6px; font-size: 1rem; font-weight: 600;">
                    {{ $review->updated_at ? $review->updated_at->format('d M Y H:i') : '-' }}
                </span>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Action Buttons Section -->
<div style="max-width: 800px; margin: 0 auto;">
    <div style="background: #f8f9fa; padding: 2rem; border-radius: 12px; margin-top: 2rem;">
        <h6 style="color: #ffffff; font-weight: 700; margin-bottom: 1.5rem; font-size: 1.2rem;">⚙️ Aksi</h6>
        <div class="action-buttons">
            <a href="{{ route('reviews.index') }}" class="btn btn-ghost">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Kembali ke Daftar
            </a>
            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Edit Data
            </a>
            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('⚠️ Yakin ingin menghapus review dari &quot;{{ $review->reviewer_name }}&quot;? Tindakan ini tidak bisa dibatalkan.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                    Hapus Data
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

