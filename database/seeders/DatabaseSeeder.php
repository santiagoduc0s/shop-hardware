<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'password' => bcrypt('12345678'),
             'is_admin' => true,
         ]);

        // banners
        Banner::query()->create([
            'name' => 'Fondo publico',
            'type' => Banner::BACKGROUND_BANNER,
            'private' => false,
        ]);

        Banner::query()->create([
            'name' => 'Fondo privado',
            'type' => Banner::BACKGROUND_BANNER,
            'private' => true,
        ]);
    }
}
