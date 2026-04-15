<?php

use App\Http\Controllers\DestinationController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Destination;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttractionController;

Route::get('/', function () {
    return view(view: 'welcome');
});
Route::get(uri: "/halo",  action: function () {
    $name = "Rozi";
    $hobis = ["Membaca", "Menulis", "Coding"];
    return view(view: 'web', data: compact('name', 'hobis'));
});

Route::get(uri: "/switch", action: function () {
    $role = "Penulis";
    return view('switch', data: compact('role'));
});

Route::get(uri: "master", action: function () {
    return view(view: 'pages.about');
});

Route::get(uri: "/about", action: function () {
    return view(view: 'pages.about');
});

Route::get(uri: "/destination", action: function () {
    $destinasi = [
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



    return view('pages.Destination', compact("destinasi"));
});


// Route::get( uri: "/user ", action: function () {
//     $users = User::where('name', 'Zidan')->get();
//     return view( view: 'pages.profile', data: compact('users'));
// });

Route::get(uri: "/destinations ", action: [DestinationController::class, 'index']);

Route::get(uri: "/detaildestinations/{id}", action: function ($id) {

    $destination = Destination::findOrFail($id);

    return view(view: 'pages.latihan', data: compact('destination'));
});



Route::prefix('destinations')->name('destinations.')->group(function () {
    Route::get("/", [DestinationController::class, 'index'])->name('index');
    Route::get("/{id}", [DestinationController::class, 'show'])->name('show');
    Route::get("/create", [DestinationController::class, 'create'])->name('create');
    Route::post("/", [DestinationController::class, 'store'])->name('store');
    Route::get("/{id}/edit", [DestinationController::class, 'edit'])->name('edit');
    Route::put("/{id}/update", [DestinationController::class, 'update'])->name('update');
    Route::delete('/{id}', [DestinationController::class, 'delete'])->name('delete');
});


Route::prefix("/users")->name('users.')->group(function () {
    Route::get("/", [UserController::class, 'index'])->name('index');
    Route::get("/create", [UserController::class, 'create'])->name('create');
    Route::get("/{id}", [UserController::class, 'show'])->name('show');

    Route::post("/", [UserController::class, 'store'])->name('store');
    Route::get("/{id}/edit", [UserController::class, 'edit'])->name('edit');
    Route::put("/{id}/update", [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');
    Route::get('/users/export', [UserController::class, 'export'])->name('users.export');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
});


Route::prefix("/attractions")->name('attractions.')->group(function () {
    Route::get("/", [AttractionController::class, 'index'])->name('index');
    Route::get("/create", [AttractionController::class, 'create'])->name('create');
    Route::get("/{id}", [AttractionController::class, 'show'])->name('show');

    Route::post("/", [AttractionController::class, 'store'])->name('store');
    Route::get("/{id}/edit", [AttractionController::class, 'edit'])->name('edit');
    Route::put("/{id}/update", [AttractionController::class, 'update'])->name('update');
    Route::delete('/{id}', [AttractionController::class, 'delete'])->name('delete');
    Route::get('/users/export', [AttractionController::class, 'export'])->name('users.export');
    Route::get('/users/search', [AttractionController::class, 'search'])->name('users.search');
});