@extends('master')

@section('content')

<style>
    /* HERO */
    .hero {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                    url('https://th.bing.com/th/id/OIP.u-1SgQX8lraAMmfCcECCwQHaDo?w=312&h=171&c=7&r=0&o=7&pid=1.7&rm=3');
        background-size: cover;
        background-position: center;
        height: 300px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-bottom: 40px;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    /* CARD */
    .card-destinasi {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: 0.3s;
    }

    .card-destinasi:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }

    .card-destinasi img {
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        text-align: center;
    }

    .btn-custom {
        background-color: #ffc107;
        border: none;
        font-weight: 500;
    }

    .btn-custom:hover {
        background-color: #e0a800;
    }
</style>

<div class="container">

    <!-- HERO -->
    <div class="hero">
        <h1>Destinasi</h1>
    </div>

    <!-- LIST DESTINASI -->
    <div class="row">

        <!-- CARD 1 -->
        <div class="col-md-4 mb-4">
            <div class="card card-destinasi shadow">
                <img src="https://tse3.mm.bing.net/th/id/OIP.n11j5_iOuy_YMoZ0XwwwMwHaEg?rs=1&pid=ImgDetMain&o=7&rm=3" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Pantai Lombok</h5>
                    <p class="text-muted">
                        Nikmati keindahan pantai dengan pasir putih dan air jernih.
                    </p>
                    <a href="#" class="btn btn-custom">Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-4 mb-4">
            <div class="card card-destinasi shadow">
                <img src="https://th.bing.com/th/id/OIP.mvHjFfv36SojcZbvPT80GgHaEK?w=295&h=180&c=7&r=0&o=7&pid=1.7&rm=3" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Pulau Tiga</h5>
                    <p class="text-muted">
                        Pulau eksotis dengan pemandangan alam yang menakjubkan.
                    </p>
                    <a href="#" class="btn btn-custom">Selengkapnya</a>
                </div>
            </div>
        </div>

        
         <!-- CARD 3 -->
        <div class="col-md-4 mb-4">
            <div class="card card-destinasi shadow">
                <img src="https://th.bing.com/th/id/OIP.9Ixuhie9jnIsV5KG6Sb7ogHaEo?w=272&h=180&c=7&r=0&o=7&pid=1.7&rm=3" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Pantai Pugin</h5>
                    <p class="text-muted">
                        Tempat sempurna untuk menikmati sunset yang indah.
                    </p>
                    <a href="#" class="btn btn-custom">Selengkapnya</a>
                </div>
            </div>
        </div>

    </div>

</div>
</div>

<!-- LIST DESTINASI -->
    <div class="row">

     


 <!-- CARD 4 -->
        <div class="col-md-4 mb-4">
            <div class="card card-destinasi shadow">
                <img src="data:image/webp;base64,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" class="card-img-top">
                <div class="card-body">
                    <h5 class="fw-bold">Asia Haritage</h5>
                    <p class="text-muted">
                        Tempat sempurna untuk menikmati sunset yang indah.

                        <p>Asia Heritage adalah taman wisata edukasi dan hiburan seluas sekitar 16 hektar yang mengusung tema budaya dari empat negara: -Indonesia 🇮🇩, -Jepang 🇯🇵, -Korea 🇰🇷, dan -Tiongkok 🇨🇳. Di sini, kamu tidak hanya melihat replika bangunan ikonik, tapi juga bisa merasakan atmosfer budayanya secara langsung.</p>
                    </p>
                    <a href="#" class="btn btn-custom">Selengkapnya</a>
                </div>
            </div>
        </div>

    </div>

</div>
</div>




@endsection