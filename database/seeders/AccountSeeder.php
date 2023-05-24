<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'gender_id' => 1,
            'first_name' => 'Admin',
            'last_name' => ' ',
            'email' => 'admin@admin.com',
            'display_picture_link' => 'test',
            'password' => bcrypt('admin')
        ]);
        User::create([
            'role_id' => 2,
            'gender_id' => 2,
            'first_name' => 'User',
            'last_name' => ' ',
            'email' => 'user@user.com',
            'display_picture_link' => 'test',
            'password' => bcrypt('user')
        ]);
    }
}
