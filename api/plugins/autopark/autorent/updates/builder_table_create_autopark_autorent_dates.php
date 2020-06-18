<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAutoparkAutorentDates extends Migration
{
    public function up()
    {
        Schema::create('autopark_autorent_dates', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('pickup');
            $table->dateTime('dropoff');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('autopark_autorent_dates');
    }
}
