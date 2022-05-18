<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         $root = \App\Models\User::factory()->create([
             'first_name' => 'Root',
             'last_name' => 'User',
             'username' => '_root_',
             'email' => 'root@app',
             'email_verified_at' => now(),
             'password' => Hash::make('147258'),
         ]);

         $role = Role::create(['name' => '_root_']);

         $root->assignRole($role);
    }
}
