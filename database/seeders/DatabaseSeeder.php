<?php

namespace Database\Seeders;

use App\Models\Attraction;
use App\Models\User;
use Dom\Attr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'z1343',
        ]);
        $this->call([
           DestinationSeeder::class,
            UserSeeder::class,
            
        ]);
    }
}
