<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAutoparkAutorentBookings extends Migration
{
    public function up()
    {
        Schema::create('autopark_autorent_bookings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->dateTime('pickup');
            $table->dateTime('dropoff');
            $table->dateTime('pricerented');
            $table->integer('deposit');
            $table->string('clie_name');
            $table->string('clie_contac');
            $table->text('notes');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('autopark_autorent_bookings');
    }
}
