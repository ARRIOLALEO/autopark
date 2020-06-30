<?php namespace Autopark\Autorent\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAutoparkAutorentClie extends Migration
{
    public function up()
    {
        Schema::create('autopark_autorent_clie', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('contact');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('autopark_autorent_clie');
    }
}
