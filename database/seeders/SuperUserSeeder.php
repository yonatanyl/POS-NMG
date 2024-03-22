<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => Hash::make(12345678),
            'is_active' => 1
        ]);

        $user2 = User::create([
            'name' => 'Owner',
            'email' => 'ceo@owner.com',
            'password' => Hash::make(12345678),
            'is_active' => 1
        ]);

        $user3 = User::create([
            'name' => 'Administrator',
            'email' => 'admin2@test.com',
            'password' => Hash::make(12345678),
            'is_active' => 1
        ]);

        $superAdmin = Role::create([
            'name' => 'Super Admin'
        ]);

        $user1->assignRole($superAdmin);
        $user2->assignRole($superAdmin);
        $user3->assignRole($superAdmin);
    }
}
