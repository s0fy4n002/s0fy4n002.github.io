<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
        	'site_name' => 'Laravels blog',
        	'address' => 'Russia petersburg',
        	'contact_number' => '8 900 7555',
        	'contact_email' => 'info@laravel_blog.com'
        ]);
    }
}
