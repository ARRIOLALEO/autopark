<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAutoparkAutorentCliRentCar extends Migration
{
    public function up()
    {
        Schema::create('autopark_autorent_cli_rent_car', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id_car');
            $table->integer('id_clien');
            $table->integer('id_rent');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('autopark_autorent_cli_rent_car');
    }
}
