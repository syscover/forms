<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsCreateTableForm extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('004_401_state', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_401')->unsigned();
            $table->string('name_401', 100);
            $table->string('color_401', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('004_401_state');
    }

}
