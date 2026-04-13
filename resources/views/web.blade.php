<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0d6efd, #4dabf7);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-custom {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card card-custom p-4 text-center">

            <!-- Greeting -->
            <h2 class="fw-bold mb-3">
                Halo, {{ $name }} 👋
            </h2>

            <p class="text-muted mb-4">
                Selamat datang! Berikut adalah daftar hobi kamu:
            </p>

            <!-- List Hobi -->
            <ul class="list-group">
                @foreach ($hobis as $hobi)
                    <li class="list-group-item">
                        🎯 {{ $hobi }}
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

</body>
</html>



