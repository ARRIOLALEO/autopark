<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAutoparkAutorentLocation extends Migration
{
    public function up()
    {
        Schema::create('autopark_autorent_location', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('location')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('autopark_autorent_location');
    }
}
