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
        if(!Schema::hasTable('004_404_comment'))
        {
            Schema::create('004_404_comment', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id_404')->unsigned();
                $table->integer('record_id_404')->unsigned();
                $table->integer('user_id_404')->unsigned();
                $table->integer('date_404')->unsigned();
                $table->string('subject_404', 255);
                $table->text('comment_404');

                $table->foreign('record_id_404', 'fk01_004_404_comment')
                    ->references('id_403')
                    ->on('004_403_record')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('user_id_404', 'fk02_004_404_comment')
                    ->references('id_010')
                    ->on('001_010_user')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            });
        }
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