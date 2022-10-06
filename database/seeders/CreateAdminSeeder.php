<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'first_name' => 'Tomáš',
                'last_name' => 'Ludwig',
                'username' => 'administrátor',
                'mobile' => '730681670',
                'email' => 'admin@softici.com',
                'password' => bcrypt('123456789'),
                'is_admin' => '1',
            ],

        );
        User::create(
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'username' => 'adminis',
                'mobile' => '730681670',
                'email' => 'admin@admin.com',
                'password' => bcrypt('secret'),
                'is_admin' => '1',
            ],

        );
    }
}
