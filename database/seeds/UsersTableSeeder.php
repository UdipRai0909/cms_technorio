<?php

use App\Profile;
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
        $user = App\User::create([

            'name' => 'Administrator',
            'email' => 'admin_tech@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([

            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/avatar2.png',
            'about' => 'This is the default generated (hard-coded) description for the admin.',
            'facebook' => 'https://www.facebook.com',
            'youtube' => 'https://www.youtube.com'
        ]);


    }
}
