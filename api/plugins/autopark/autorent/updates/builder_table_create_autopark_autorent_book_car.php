<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAutoparkAutorentBookCar extends Migration
{
    public function up()
    {
        Schema::create('autopark_autorent_book_car', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('car_id');
            $table->integer('book_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('autopark_autorent_book_car');
    }
}
