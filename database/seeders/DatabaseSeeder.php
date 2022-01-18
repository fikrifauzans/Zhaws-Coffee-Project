<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        Admin::create([
            'name' => 'Admin',
            'email' => 'zahws@admin.com',
            'password' => bcrypt('zahws123')
        ]);
    }
}
