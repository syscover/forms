<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsCreateTableMessage extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('004_405_message', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_405')->unsigned();
            $table->integer('record_405')->unsigned();
            $table->integer('date_405')->unsigned();
            $table->integer('send_date_405')->unsigned()->nullable();
            $table->boolean('dispatched_405')->default(false);
            $table->string('template_405', 255);
            $table->text('data_405');

            $table->foreign('record_405')->references('id_403')->on('004_403_record')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('004_405_message');
    }
}