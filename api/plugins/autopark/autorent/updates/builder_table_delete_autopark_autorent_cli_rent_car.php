<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteAutoparkAutorentCliRentCar extends Migration
{
    public function up()
    {
        Schema::dropIfExists('autopark_autorent_cli_rent_car');
    }
    
    public function down()
    {
        Schema::create('autopark_autorent_cli_rent_car', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('reservation_id');
            $table->integer('client_id');
            $table->integer('car_id');
        });
    }
}
