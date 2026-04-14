<?php

use App\Http\Controllers\DestinationController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Destination;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view( view: 'welcome');
});
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


// Route::get( uri: "/user ", action: function () {
//     $users = User::where('name', 'Zidan')->get();
//     return view( view: 'pages.profile', data: compact('users'));
// });

Route::get( uri: "/destinations ", action: [DestinationController::class, 'index']);

Route::get( uri: "/detaildestinations/{id} ", action: function ($id) {

    $destinations = Destination::find($id);
  
    return view( view: 'pages.latihan', data: compact('destinations'));
});

Route::get("/destination/create", [DestinationController::class, 'create']);
Route::post("/destinations", [DestinationController::class, 'store']);
Route::get("/destinations/{id}/edit", [DestinationController::class, 'edit']);
Route::put("/destinations/{id}/update", [DestinationController::class, 'update']);
Route::delete('/destinations/{id}', [DestinationController::class, 'delete']);


Route::get("/users", [UserController::class, 'index']);
// Route::get("/users/{id}", [UserController::class, 'show']);
Route::get("/users/create", [UserController::class, 'create']);
Route::post("/users", [UserController::class, 'store']);
Route::get("/users/{id}/edit", [UserController::class, 'edit']);
Route::put("/users/{id}/update", [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);

 
