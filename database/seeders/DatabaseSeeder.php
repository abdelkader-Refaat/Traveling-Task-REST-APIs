<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\Travel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Travel::factory()->count(16)->create();
        // Tour::factory()->count(16)->create();
        // User::factory(10)->create();
        $this->call(RoleSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
