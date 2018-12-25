<?php

use App\TempAccount;
use Illuminate\Database\Seeder;

class TempAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TempAccount::truncate();
        TempAccount::insert([
           'email' => 'najmul.kfc@gmail.com',
           'access_token' => str_random(20),
           'is_register' => false,
        ]);
    }
}
