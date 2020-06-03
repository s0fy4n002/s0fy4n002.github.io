<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Link;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();            
            $table->string('url');
            $table->string('description');
            $table->timestamps();
        });
        
	    Link::create([
	    'url' => 'https://laravel.com/',
	    'description' => 'Laravel - The PHP framework for web artisans.',
	    ]);

	    Link::create([
	        'url' => 'https://laracasts.com/',
	        'description' => 'The best PHP and Laravel screencasts on the web.',
	    ]);

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
