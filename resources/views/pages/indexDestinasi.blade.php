@extends('master')


@section('content')
<div class="container">
    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{request('search')}}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
    <table class="table table-dark table-striped-columns">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Price</th>
                <th>Working Hours</th>
                <th>Working Days</th>
            </tr>
        </thead>
        <tbody>
            @foreach($destinations as $d)
            <tr>
                <td><a href="detaildestinations/{{$d->id}}">{{ $d->id }}</a></td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->description }}</td>
                <td>{{ $d->location }}</td>
                <td>{{ $d->ticket_price }}</td>
                <td>{{ $d->working_hours }}</td>
                <td>{{ $d->working_day}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Detail Destinasi</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #f4f7fb;
}

/* CARD */
.detail-card {
    max-width: 900px;
    margin: 50px auto;
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    overflow: hidden;
}

/* HEADER */
.card-header {
    background: linear-gradient(135deg, #00c6ff, #0072ff);
    color: white;
    padding: 30px;
}

.card-header h1 {
    margin: 0;
    font-size: 32px;
    text-transform: capitalize;
}

/* BODY */
.card-body {
    padding: 30px;
    color: #444;
    line-height: 1.7;
}

/* INFO GRID */
.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-top: 25px;
}

.info-item {
    background: #f8f9fc;
    padding: 15px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.info-item i {
    color: #0072ff;
    font-size: 18px;
}

/* PRICE */
.price {
    margin-top: 20px;
    padding: 15px;
    background: #e3f2fd;
    border-left: 5px solid #0072ff;
    border-radius: 8px;
    font-weight: bold;
}

/* RESPONSIVE */
@media(max-width: 768px){
    .info-grid {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body>

<div class="detail-card">

    <div class="card-header">
        <h1>Gunung Bromo</h1>
    </div>

    <div class="card-body">
        <p>
            Gunung Bromo merupakan salah satu destinasi wisata terkenal di Indonesia yang terletak 
            di kawasan Taman Nasional Bromo Tengger Semeru, Provinsi Jawa Timur. Gunung ini terkenal 
            dengan keindahan alamnya yang memukau seperti lautan pasir, kawah aktif, dan pemandangan 
            matahari terbit yang sangat indah.
        </p>

        <div class="info-grid">
            <div class="info-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Malang, Jawa Timur</span>
            </div>

            <div class="info-item">
                <i class="fas fa-calendar"></i>
                <span>Setiap Hari</span>
            </div>

            <div class="info-item">
                <i class="fas fa-clock"></i>
                <span>24 Jam</span>
            </div>

            <div class="info-item">
                <i class="fas fa-ticket-alt"></i>
                <span>Tiket Masuk</span>
            </div>
        </div>

        <div class="price">
            💰 Rp30.000 - Rp50.000 / orang
        </div>

    </div>

</div>

</body>
</html>













@endsection
    