<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsCreateTableComment extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('004_404_comment', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_404')->unsigned();
            $table->integer('record_404')->unsigned();
            $table->integer('user_404')->unsigned();
            $table->integer('date_404')->unsigned();
            $table->text('comment_404')->unsigned();

            $table->foreign('record_404')->references('id_403')->on('004_403_record')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_404')->references('id_010')->on('001_010_user')
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
        Schema::drop('004_404_comment');
    }

}
