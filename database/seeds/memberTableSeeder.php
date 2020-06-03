<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Member;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class memberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	factory(Member::class, 50)->create();
    }
}
