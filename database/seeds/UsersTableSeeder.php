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
        $user = App\User::create([
            'name' => 'Marouane',
            'email' => 'marouane@marou.me',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png', 
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero voluptates quae sed laudantium culpa quam hic. Obcaecati quidem totam sed amet ad! Doloribus iusto placeat fuga, quia animi quibusdam sequi.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
