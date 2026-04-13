<?php
    
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Destination;

// Route::get(uri:'/', function () {
//     return view( view: 'welcome');
// });
Route::get( uri: "/halo",  action: function() {
    $name = "Rozi";
    $hobis = ["Membaca", "Menulis", "Coding"];
    return view( view: 'web', data: compact('name', 'hobis'));
});

Route::get(uri: "/switch", action: function () {
    $role = "Penulis";
    return view('switch', data: compact('role'));
});

Route::get(uri: "master", action: function () {
    return view( view: 'pages.about');
});

Route::get(uri: "/about", action: function () {
    return view( view: 'pages.about');
});

Route::get(uri: "/destination", action: function () {
    $destinasi= [
          "nama" => "",
        "harga" => 2000000,
        "lokasi" => "Malang,",
        "durasi" => "4 Hari 3 Malam",
        "transportasi" => "Pesawat",
        "hotel" => "Bintang 4",
        "rating" => 4.9,
        "fasilitas" => 
        ["Hotel", "Sarapan", "Tour Guide", "Transport Lokal"],
    ];


   
    return view('pages.Destination',compact("destinasi"));
});


Route::get( uri: "/user ", action: function () {
    $users = User::where('name', 'Zidan')->get();
    return view( view: 'pages.profile', data: compact('users'));
});

Route::get( uri: "/destinations ", action: function () {

    $destinations = Destination::all();
  
    return view( view: 'pages.indexDestinasi', data: compact('destinations'));
});

Route::get( uri: "/detaildestinations/{id} ", action: function ($id) {

    $destinations = Destination::find($id);
  
    return view( view: 'pages.latihan', data: compact('destinations'));
});

Route::get("/destination/create", [DestinationController::class, 'create']);
Route::post("/destinations", [DestinationController::class, 'store']);
Route::get("/destinations/{id}/edit", [DestinationController::class, 'edit']);
Route::put("/destinations/{id}/update", [DestinationController::class, 'update']);
Route::delete('/destinations/{id}', [DestinationController::class, 'delete']);
