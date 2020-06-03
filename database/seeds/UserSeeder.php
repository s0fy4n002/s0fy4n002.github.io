<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = User::create([
	    	'name' => 'M Sofyansyah',
	    	'admin' => 1,
	        'email' => 's0fy4n002@gmail.com',
	        'email_verified_at' => now(),
	        'password' => Hash::make('password'),
	        'remember_token' => Str::random(10),
        ]);

        Profile::create([
	    	'user_id' => $user->id,
	    	'avatar' => 'posts/image.jpeg',
	    	'about' => 'asdf asdf asdf asdf asdf',
	    	'facebook' => 'facebook.com',
	    	'youtube' => 'youtube.com',
        ]);

        $user = User::create([
	    	'name' => 'Yayan',
	    	'admin' => 1,
	        'email' => 'y4y4n@gmail.com',
	        'email_verified_at' => now(),
	        'password' => Hash::make('password'),
	        'remember_token' => Str::random(10),
        ]);
        Profile::create([
	    	'user_id' => $user->id,
	    	'avatar' => 'posts/image.jpeg',
	    	'about' => 'asdf asdf asdf asdf asdf',
	    	'facebook' => 'facebook.com',
	    	'youtube' => 'youtube.com',
        ]);

        $user = User::create([
	    	'name' => $faker->name,
	        'email' => 'doe@gmail.com',
	        'password' => Hash::make('password'),
	        'remember_token' => Str::random(10),
        ]);
        Profile::create([
	    	'user_id' => $user->id,
	    	'avatar' => 'posts/image.jpeg',
	    	'about' => 'asdf asdf asdf asdf asdf',
	    	'facebook' => 'facebook.com',
	    	'youtube' => 'youtube.com',
        ]);
    }
}
