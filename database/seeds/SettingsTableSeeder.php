<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'Laravel\'s Blog',
            'address' => 'Casablanca, Morocco',
            'contact_number' => '6 92 94 60 54',
            'contact_email' => 'info@laravelblog.com'
        ]);
    }
}
