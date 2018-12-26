<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([[
            'name' => 'Super Admin',
            'email' => 'super.admin@gmail.com',
            'password' => bcrypt('super.admin'),
            'user_type' => 'super_admin',
            'restaurant_id' => Null,

        ],
            [
            'name' => 'Restaurant Admin',
            'email' => 'restaurant.admin@gmail.com',
            'password' => bcrypt('restaurant.admin'),
            'user_type' => 'admin',
            'restaurant_id' => 1,

        ]
        ]);
    }
}
