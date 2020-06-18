<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAutoparkAutorentAutoLocat extends Migration
{
    public function up()
    {
        Schema::create('autopark_autorent_auto_locat', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('car_id');
            $table->integer('location_id');
            $table->primary(['car_id','location_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('autopark_autorent_auto_locat');
    }
}
