<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteAutoparkAutorentClie extends Migration
{
    public function up()
    {
        Schema::dropIfExists('autopark_autorent_clie');
    }
    
    public function down()
    {
        Schema::create('autopark_autorent_clie', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 191);
            $table->string('contact', 191);
        });
    }
}
