<?php

namespace Database\Seeders;

use App\Repositories\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'admin',
            'email' => 'admin@pear.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',// password
            'remember_token' => Str::random(10),
        ]);
    }
}
