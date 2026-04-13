@extends("master")

@section('content')

<!-- Hero Section -->
<div class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="fw-bold display-4">Jelajahi Dunia Bersama Kami 🌍</h1>
        <p class="lead">Temukan destinasi impianmu dengan harga terbaik</p>
        <a href="#" class="btn btn-light btn-lg mt-3 px-4">
            Mulai Sekarang
        </a>
    </div>
</div>

<!-- Fitur -->
<div class="container mt-5">
    <div class="row text-center">

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h1>✈️</h1>
                    <h5 class="fw-bold mt-2">Transportasi Nyaman</h5>
                    <p class="text-muted">
                        Perjalanan aman dengan transportasi terbaik.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h1>🏨</h1>
                    <h5 class="fw-bold mt-2">Hotel Berkualitas</h5>
                    <p class="text-muted">
                        Menginap di hotel pilihan dengan fasilitas lengkap.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <h1>🧭</h1>
                    <h5 class="fw-bold mt-2">Tour Guide</h5>
                    <p class="text-muted">
                        Didampingi guide berpengalaman selama perjalanan.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Destinasi Populer -->
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Destinasi Populer</h2>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <img src="https://source.unsplash.com/400x300/?beach" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Bali</h5>
                    <p class="text-muted">Pulau wisata dengan pantai indah dan budaya unik.</p>
                    <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <img src="https://source.unsplash.com/400x300/?mountain" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Malang</h5>
                    <p class="text-muted">Kota sejuk dengan wisata alam yang memukau.</p>
                    <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <img src="https://source.unsplash.com/400x300/?city" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Jakarta</h5>
                    <p class="text-muted">Ibu kota dengan berbagai destinasi modern.</p>
                    <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- CTA Section -->
<div class="bg-light mt-5 py-5 text-center">
    <div class="container">
        <h3 class="fw-bold">Siap untuk liburan?</h3>
        <p class="text-muted">Pesan sekarang dan nikmati pengalaman tak terlupakan</p>
        <a href="#" class="btn btn-primary px-4">
            Booking Sekarang
        </a>
    </div>
</div>

@endsection