<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'id' => 1,
            'name' => 'abdelkader',
            'email' => 'abdelkader@gmail.com',
            'password' => 'mnmnmnmnmn',
        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'id' => 2,
            'name' => 'omar',
            'email' => 'omar@gmail.com',
            'password' => 'mnmnmnmnmn',
        ]);
        $editor->assignRole('editor');

        $user = User::create([
            'id' => 3,
            'name' => 'amr',
            'email' => 'amr@gmail.com',
            'password' => 'mnmnmnmnmn',
        ]);
        $editor->assignRole('user');
    }
}
