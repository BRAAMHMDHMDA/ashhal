<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Create Owner's user App
        User::create([
            'name' => 'Owner',
            'email' => 'owner@ashal.com',
            'password'=>Hash::make('000'),
        ]);

    }
}
