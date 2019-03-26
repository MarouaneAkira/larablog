<?php

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
        App\Users::create([
            'name' => 'Marouane',
            'email' => 'marouane@marou.me',
            'password' => bcrypt('password')
        ]);
    }
}
