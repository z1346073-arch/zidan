<style>
    .navbar-custom {
        background: linear-gradient(135deg, #0d6efd, #4dabf7);
    }

    .navbar-custom .nav-link {
        color: white !important;
        margin-right: 10px;
        transition: 0.3s;
        border-radius: 8px;
        padding: 6px 12px;
    }

    .navbar-custom .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .navbar-custom .nav-link.active {
        background-color: white;
        color: #0d6efd !important;
        font-weight: 500;
    }

    .navbar-brand {
        font-size: 1.4rem;
        letter-spacing: 1px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom shadow sticky-top">
    <div class="container">

        <!-- Logo / Brand -->
        <a class="navbar-brand text-white fw-bold" href="#">
            🌍 TravelApp
        </a>

        <!-- Toggle Button (Mobile) -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item">
                    <a class="nav-link active" href="#">🏠 Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">📍 Destinasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">🎒 Paket</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">📞 Kontak</a>
                </li>

                <!-- Button CTA -->
                <li class="nav-item ms-3">
                    <a href="#" class="btn btn-light text-primary fw-semibold px-3 rounded-pill">
                        Login
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>