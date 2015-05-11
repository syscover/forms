<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsCreateTableDataForm extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('004_403_data_comment_form', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_403')->unsigned();
            $table->integer('data_form_403')->unsigned();
            $table->integer('user_401')->unsigned();
            $table->integer('date_401')->unsigned();
            $table->text('comment_401')->unsigned();

            $table->foreign('data_form_403')->references('id_401')->on('004_401_data_form')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_403')->references('id_010')->on('001_010_user')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('004_403_data_comment_form');
    }

}
