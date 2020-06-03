<?php

use Illuminate\Database\Seeder;

class mapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Mapel::create([
        	'kode'	=> 'M-001',
        	'nama'	=> 'Matematika Dasar',
        	'semester'	=> 'ganjil',
        ]);
        \App\Mapel::create([
        	'kode'	=> 'M-002',
        	'nama'	=> 'Bahasa Indonesia',
        	'semester'	=> 'ganjil',
        ]);
        \App\Mapel::create([
        	'kode'	=> 'M-003',
        	'nama'	=> 'Bahasa Inggris',
        	'semester'	=> 'genap',
        ]);
        \App\Mapel::create([
        	'kode'	=> 'M-004',
        	'nama'	=> 'Agama',
        	'semester'	=> 'genap',
        ]);
    }
}
