@extends('master')

@section('content')

<div class="page-title" style="margin-bottom: 2rem;">
    <h1>Daftar Review</h1>
    <p>Kelola semua review attraction Anda di sini</p>
</div>

<div style="margin-bottom: 1.5rem;">
    <a href="{{ route('reviews.create') }}" class="btn btn-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Tambah Review
    </a>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Reviewer</th>
                    <th>Attraction</th>
                    <th>Komentar</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($review as $review)
                    <tr>
                        <td>
                            <span class="id-badge">{{ $review->id }}</span>
                        </td>
                        <td>
                            <strong>{{ $review->reviewer_name }}</strong>
                        </td>
                        <td>
                            <strong>{{ $review->attraction->name }}</strong>
                            @if($review->attraction->destination)
                                <br>
                                <small style="color: var(--text-muted);">
                                    📍 {{ $review->attraction->destination->name }}
                                </small>
                            @endif
                        </td>
                        <td>
                            <small>{{ Str::limit($review->comment ?? 'Tidak ada komentar', 60) }}</small>
                        </td>
                        <td style="text-align: center;">
                            <div style="display: flex; gap: 6px; justify-content: center; flex-wrap: wrap;">
                                <a 
                                    href="{{ route('reviews.show', $review->id) }}" 
                                    class="btn btn-sm" 
                                    style="background: rgba(16, 185, 129, 0.12); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.2);"
                                    title="Lihat Detail"
                                >
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                </a>
                                <a 
                                    href="{{ route('reviews.edit', $review->id) }}" 
                                    class="btn btn-sm btn-warning"
                                    title="Edit"
                                >
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                </a>
                                <form 
                                    action="{{ route('reviews.destroy', $review->id) }}" 
                                    method="POST" 
                                    style="display: inline-block;"
                                    onsubmit="return confirm('Yakin ingin menghapus review dari {{ $review->reviewer_name }}?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-danger"
                                        title="Hapus"
                                    >
                                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 2rem;">
                            <div style="color: var(--text-muted);">
                                <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="margin: 0 auto 12px;">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 15h6"/></svg>
                                <p>Tidak ada review yang ditemukan</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

