<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name'=>'Sigi Pablo',
            'email'=> 'sigi@donadorescompulsivos.org',
            'email_verified_at'=>'2020-11-05 12:00:00',
            'password'=>'$2y$10$uV.lP6hFM4GQWmFisUCVg.Hq3waa/kf0NsDNMh40Ufq9nDMdGEAba',
            'remember_token' => null,
            'created_at'=>'2020-09-28 12:00:00',
            'updated_at'=>'2020-09-28 12:00:00'
        ]);
    }
}
