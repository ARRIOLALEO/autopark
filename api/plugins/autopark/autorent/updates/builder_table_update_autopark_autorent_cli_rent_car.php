<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAutoparkAutorentCliRentCar extends Migration
{
    public function up()
    {
        Schema::table('autopark_autorent_cli_rent_car', function($table)
        {
            $table->integer('car_id');
            $table->integer('reservation_id');
            $table->integer('client_id');
            $table->dropColumn('id_car');
            $table->dropColumn('id_clien');
            $table->dropColumn('id_rent');
        });
    }
    
    public function down()
    {
        Schema::table('autopark_autorent_cli_rent_car', function($table)
        {
            $table->dropColumn('car_id');
            $table->dropColumn('reservation_id');
            $table->dropColumn('client_id');
            $table->integer('id_car');
            $table->integer('id_clien');
            $table->integer('id_rent');
        });
    }
}
