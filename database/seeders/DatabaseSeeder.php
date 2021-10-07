<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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
        $user = User::create([
            'name' => 'Braa Hmda',
            'username' => 'bhmda',
            'phone' => '0599584992',
            'status' => 'active',
            'image' => 'users/default.png',
            'email' => 'owner@ashal.com',
            'password'=>Hash::make('000'),
        ]);

        $role = Role::create(['name' => 'Owner']);
        $user->assignRole([$role->id]);

    }
}
