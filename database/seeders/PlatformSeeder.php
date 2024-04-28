<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            'WINDOWS',
            'PS1',
            'PS2',
            'PS3',
            'PS4',
            'PS5',
            'XBOX',
            'XBOX 360',
            'XBOX ONE',
            'XBOX SERIES S/X',
            'NINTENTDO WII',
            'NINTENDO 3DS',
            'NINTENDO SWITCH'
        ];

        foreach ($platforms as $platform) {
            Platform::create([
                'name' => $platform
            ]);
        }  
    }
}
