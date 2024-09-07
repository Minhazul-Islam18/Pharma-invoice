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
        $user = User::create([
            'firstname' => 'Jhon',
            'lastname' => 'Doe',
            'phone' => '0123456789',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678),
            'is_active' => 1
        ]);

        $superAdmin = Role::create([
            'name' => Role::SUPERADMIN
        ]);

        $user->assignRole($superAdmin);


        $user = User::create([
            'firstname' => 'Ahmad musa',
            'lastname' => 'Jibril',
            'phone' => '0123456789',
            'email' => 'customer@gmail.com',
            'password' => Hash::make(12345678),
            'is_active' => 1
        ]);

        $customer = Role::where([
            'name' => Role::CUSTOMER
        ])->first();

        $user->assignRole($customer);
    }
}
