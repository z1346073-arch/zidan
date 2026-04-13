<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @switch($role)
    @case("admin")
    <p>Kamu adalah seorang admin,</p>

    @case("Penulis")
    <p>Kamu adalah seorang trader</p>
    @case("Pengusaha")
    <p>Kamu adalah seorang pengusaha</p>
    <h1>yang suka dengan tantangan</h1>
    <p>Baik dari VISI,MISI,KARYAWAN,OPERASIONAL</p>


    @break
    @default
    <p>Kamu adalah seorang pengguna,</p>

    @endswitch

</body>
</html>