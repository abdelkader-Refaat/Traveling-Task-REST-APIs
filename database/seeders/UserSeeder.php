<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createUser(1, 'abdelkader', 'abdelkader@gmail.com', 'admin');
        $this->createUser(2, 'omar', 'omar@gmail.com', 'editor');
        $this->createUser(3, 'amr', 'amr@gmail.com', 'user');
    }

    private function createUser(int $id, string $name, string $email, string $role): void
    {
        $user = User::updateOrCreate(
            ['id' => $id],
            [
                'name' => $name,
                'email' => $email,
                'password' => 'mnmnmnmnmn',
            ]
        );
        $user->assignRole($role);
    }
}
