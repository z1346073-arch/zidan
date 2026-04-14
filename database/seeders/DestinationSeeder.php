<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
        'name' => "Asia Haritage",
        'description' => "Asia Heritage merupakan salah satu destinasi wisata yang cukup populer di Provinsi Riau, khususnya di Kota Pekanbaru. Tempat wisata ini menawarkan konsep taman rekreasi yang mengusung tema budaya dari berbagai negara di Asia. Dengan adanya miniatur bangunan khas dan suasana yang dibuat menyerupai negara asalnya, Asia Heritage menjadi daya tarik tersendiri bagi wisatawan lokal maupun luar daerah.",
        'location' => "Provinsi Riau",
        'working_day' => "Setiap Hari",
        'working_hours' => "pukul 09.00 hingga 18.00 WIB",
        'ticket_price' => "20000 hingga 30000 per orang",
    ]);

    Destination::create([
        'name' => "Gunung Bromo",
        'description' => "Gunung Bromo adalah sebuah gunung berapi yang terletak di Jawa Timur, Indonesia. Gunung ini dikenal dengan pemandangan alam yang indah dan fenomena alam seperti asap dan awan yang mengelilinginya.",
        'location' => "Jawa Timur",
        'working_day' => "Setiap Hari",
        'working_hours' => "pukul 06.00 hingga 17.00 WIB",
        'ticket_price' => "50000 hingga 75000 per orang",
    ]);

    Destination::create([
        'name' => "Pantai Lombok",
        'description' => "Pantai Lombok adalah salah satu destinasi wisata yang terkenal di Indonesia. Pantai ini dikenal dengan pasir putihnya yang lembut dan air laut yang jernih.",
        'location' => "Nusa Tenggara Barat",
        'working_day' => "Setiap Hari",
        'working_hours' => "24 jam sehari",
        'ticket_price' => "5000 hingga 15000 per orang",
    ]);
    for ($i = 0; $i <= 1000; $i++) {
        Destination::create([
            'name' => fake( locale: "id_ID")->name(),
            'description' => fake( locale: "id_ID")->sentence(),
            'location' => fake( locale: "id_ID")->address() . ", Pekanbaru, Riau",
            'working_day' => "Everyday",
            'working_hours' => "08:00 am - 05:00 pm",
            'ticket_price' => rand(10000, 50000),
        ]);
    }
}}