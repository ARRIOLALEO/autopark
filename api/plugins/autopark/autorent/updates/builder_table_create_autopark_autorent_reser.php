<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAutoparkAutorentReser extends Migration
{
    public function up()
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
    
    public function down()
    {
        Schema::dropIfExists('autopark_autorent_reser');
    }
}
