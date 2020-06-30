<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteAutoparkAutorentReser extends Migration
{
    public function up()
    {
        Schema::dropIfExists('autopark_autorent_reser');
    }
    
    public function down()
    {
        Schema::create('autopark_autorent_reser', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->dateTime('pickup');
            $table->dateTime('dropoff');
            $table->integer('pricerented');
            $table->integer('deposti');
        });
    }
}
