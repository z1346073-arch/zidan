@extends('master')

@section('content')
<div class="destination-detail-container">
    <!-- Hero Section with Image -->
    <div class="hero-section">
        @if($destination->image)
            <img src="{{ asset('storage/images/' . $destination->image) }}" alt="{{ $destination->name }}" class="hero-image">
        @else
            <div class="hero-image-placeholder"></div>
        @endif
        <div class="hero-overlay">
            <div class="hero-content">
                <a href="{{ route('destinations.index') }}" class="back-btn">
                    <i class="bi bi-chevron-left"></i> Kembali
                </a>
                <h1 class="hero-title">{{ $destination->name }}</h1>
                <p class="hero-subtitle">
                    <i class="bi bi-geo-alt-fill"></i> {{ $destination->location }}
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    
                    <!-- Description Section -->
                    <section class="content-section">
                        <div class="section-header">
                            <h2>Tentang Destinasi</h2>
                            <div class="header-line"></div>
                        </div>
                        <p class="description-text">
                            {{ $destination->description ?? 'Tidak ada deskripsi.' }}
                        </p>
                    </section>

                    <!-- Info Cards Grid -->
                    <section class="info-section">
                        <div class="info-grid">
                            <!-- Harga Tiket -->
                            <div class="info-card">
                                <div class="info-icon">
                                    <i class="bi bi-ticket-perforated"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Harga Tiket</h5>
                                    <p class="info-value">Rp {{ number_format($destination->ticket_price, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <!-- Jam Operasional -->
                            <div class="info-card">
                                <div class="info-icon">
                                    <i class="bi bi-clock-fill"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Jam Operasional</h5>
                                    <p class="info-value">{{ $destination->working_hours ?? 'Tidak tersedia' }}</p>
                                </div>
                            </div>

                            <!-- Hari Operasional -->
                            <div class="info-card">
                                <div class="info-icon">
                                    <i class="bi bi-calendar3-fill"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Hari Operasional</h5>
                                    <p class="info-value">{{ $destination->working_days ?? 'Setiap Hari' }}</p>
                                </div>
                            </div>

                            <!-- Lokasi -->
                            <div class="info-card">
                                <div class="info-icon">
                                    <i class="bi bi-map-fill"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Lokasi</h5>
                                    <p class="info-value">{{ $destination->location }}</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Action Buttons -->
                    <section class="action-section">
                        <div class="button-group">
                            <a href="{{ route('destinations.edit', $destination->id) }}" class="btn-primary-modern">
                                <i class="bi bi-pencil-square"></i>
                                <span>Edit Destinasi</span>
                            </a>
                            <form action="{{ route('destinations.delete', $destination->id) }}" method="POST" style="flex: 1;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger-modern" onclick="return confirm('Apakah Anda yakin ingin menghapus destinasi ini?')">
                                    <i class="bi bi-trash"></i>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #0a0e27;
        color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .destination-detail-container {
        min-height: 100vh;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 400px;
        display: flex;
        align-items: flex-end;
        margin-bottom: 0;
        overflow: hidden;
    }

    .hero-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .hero-image-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        z-index: 1;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(10, 14, 39, 0.95), rgba(10, 14, 39, 0.3));
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 3rem;
        z-index: 2;
    }

    .hero-content {
        width: 100%;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #ffffff;
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding: 0.75rem 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        transition: all 0.3s ease;
        width: fit-content;
    }

    .back-btn:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.4);
        transform: translateX(-3px);
        color: #ffffff;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.9);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
    }

    /* Content Wrapper */
    .content-wrapper {
        background-color: #0a0e27;
        padding: 4rem 0;
    }

    /* Sections */
    .content-section,
    .info-section,
    .action-section {
        margin-bottom: 3rem;
    }

    /* Section Header */
    .section-header {
        margin-bottom: 2rem;
    }

    .section-header h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 0.75rem;
    }

    .header-line {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #007bff, #0056b3);
        border-radius: 2px;
    }

    /* Description Text */
    .description-text {
        font-size: 1.05rem;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.85);
        text-align: justify;
        letter-spacing: 0.3px;
    }

    /* Info Grid */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    /* Info Card */
    .info-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.02));
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 2rem;
        display: flex;
        gap: 1.5rem;
        align-items: flex-start;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.03));
        border-color: rgba(255, 255, 255, 0.15);
        transform: translateY(-4px);
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, rgba(0, 123, 255, 0.2), rgba(0, 86, 179, 0.2));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1.75rem;
        color: #007bff;
    }

    .info-content h5 {
        font-size: 0.95rem;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.7);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .info-value {
        font-size: 1.25rem;
        font-weight: 600;
        color: #ffffff;
        margin: 0;
    }

    /* Action Section */
    .button-group {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-primary-modern,
    .btn-danger-modern {
        flex: 1;
        min-width: 180px;
        padding: 1rem 2rem;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        text-decoration: none;
        color: #ffffff;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 123, 255, 0.4);
    }

    .btn-danger-modern {
        background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%);
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
        width: 100%;
    }

    .btn-danger-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
    }

    .btn-primary-modern i,
    .btn-danger-modern i {
        font-size: 1.2rem;
    }

    /* Scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #0a0e27;
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .hero-overlay {
            padding: 2rem;
        }

        .section-header h2 {
            font-size: 1.5rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .button-group {
            flex-direction: column;
        }

        .btn-primary-modern,
        .btn-danger-modern {
            width: 100%;
        }

        .content-wrapper {
            padding: 2rem 0;
        }
    }
</style>
@endsection

<style>
    body {
        background-color: #0f0f1e;
        color: #ffffff;
    }

    /* Hero Section */
    .position-relative {
        background-attachment: fixed;
    }

    /* Card Styling */
    .card {
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
    }

    .card-body {
        color: #ffffff;
    }

    .card-body p {
        color: #ffffff;
        margin: 0;
    }

    .card-body h3,
    .card-body h5,
    .card-body h6 {
        color: #ffffff !important;
    }

    /* Text Colors - All White */
    .text-white {
        color: #ffffff !important;
    }

    .text-light {
        color: #ffffff !important;
    }

    .text-secondary {
        color: rgba(255, 255, 255, 0.6) !important;
    }

    /* Buttons */
    .btn {
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-light {
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.5);
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        border-color: #ffffff;
        transform: translateY(-2px);
    }

    .btn-primary {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: none;
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 53, 69, 0.4);
    }

    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1.1rem;
    }

    /* Badge */
    .badge-lg {
        padding: 0.75rem 1.5rem !important;
        font-size: 1rem !important;
    }

    /* Borders */
    .border-secondary {
        border-color: rgba(255, 255, 255, 0.15) !important;
    }

    .border-bottom {
        border-bottom: 1px solid rgba(255, 255, 255, 0.15) !important;
    }

    /* Info Cards */
    .rounded-3 {
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .rounded-3:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    /* Images */
    .img-fluid {
        border-radius: 15px;
        transition: transform 0.3s ease;
    }

    .img-fluid:hover {
        transform: scale(1.02);
    }

    /* Shadows */
    .shadow-xl {
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4) !important;
    }

    /* Typography */
    h1, h2, h3, h4, h5, h6 {
        color: #ffffff !important;
    }

    p {
        color: #ffffff !important;
    }

    /* Hero gradient overlay */
    .display-3 {
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    }

    /* Scrollbar styling */
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
        .display-3 {
            font-size: 2rem !important;
        }

        .position-absolute.bottom-0 {
            padding: 2rem !important;
        }
    }
</style>
