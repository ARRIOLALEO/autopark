<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAutoparkAutorentCars extends Migration
{
    public function up()
    {
        Schema::create('autopark_autorent_cars', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('tittle')->nullable();
            $table->string('description')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('autopark_autorent_cars');
    }
}
