<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(ProductSeeder::class);

        User::create([
            'isAdmin' => true,
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);

        User::create([
            'name'     => 'Victor',
            'email'    => 'victor@gmail.com',
            'address'  => 'Calle Rio Anzur, 15',
            'password' => Hash::make('victor123')
        ]);
    }
}
