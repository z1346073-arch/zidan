@extends("master")

@section("content")

<div class="container mt-5">

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Tentang Kami</h1>
        <p class="text-muted">Mengenal lebih dekat TravelApp</p>
    </div>

    <!-- Card About -->
    <div class="card shadow border-0">
        <div class="row g-0">

            <!-- Gambar -->
            <div class="col-md-5">
                <img src="https://source.unsplash.com/600x400/?travel" 
                     class="img-fluid h-100 object-fit-cover rounded-start" 
                     alt="Travel">
            </div>

            <!-- Konten -->
            <div class="col-md-7">
                <div class="card-body p-4">
                    <h3 class="card-title fw-semibold mb-3">
                        🌍 TravelApp
                    </h3>

                    <p class="card-text text-muted">
                        TravelApp adalah platform yang menyediakan berbagai pilihan destinasi wisata terbaik 
                        dengan paket perjalanan yang menarik dan harga terjangkau. Kami berkomitmen untuk 
                        memberikan pengalaman liburan yang nyaman, aman, dan tak terlupakan.
                    </p>

                    <p class="card-text text-muted">
                        Dengan layanan profesional seperti tour guide berpengalaman, transportasi nyaman, 
                        dan hotel berkualitas, kami siap membantu perjalanan Anda menjadi lebih menyenangkan.
                    </p>

                    <a href="#" class="btn btn-primary mt-3">
                        Jelajahi Destinasi
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Visi Misi -->
    <div class="row mt-5 text-center">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="fw-bold">🎯 Visi</h5>
                    <p class="text-muted">
                        Menjadi platform travel terbaik dan terpercaya di Indonesia.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="fw-bold">🚀 Misi</h5>
                    <p class="text-muted">
                        Memberikan layanan perjalanan berkualitas dengan harga terbaik dan pengalaman tak terlupakan.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection