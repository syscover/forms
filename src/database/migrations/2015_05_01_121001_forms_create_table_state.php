<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsCreateTableState extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('004_400_state', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_400')->unsigned();
            $table->string('name_400', 50);
            $table->string('color_400', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('004_400_state');
    }

}
