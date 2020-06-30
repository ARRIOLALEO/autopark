<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAutoparkAutorentCliRentCar2 extends Migration
{
    public function up()
    {
        Schema::table('autopark_autorent_cli_rent_car', function($table)
        {
            $table->integer('	car_id');
        });
    }
    
    public function down()
    {
        Schema::table('autopark_autorent_cli_rent_car', function($table)
        {
            $table->dropColumn('	car_id');
        });
    }
}
