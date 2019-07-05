<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    public function run()
    {
        \App\Setting::create([

            'site_name' => 'Stephs blog',
            'contact_number' => '854-112-6287',
            'contact_email' => 'stephiscool@gmail.com',
            'address' => 'Syd, Aus'
        ]);
    }
}
