<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsCreateTableForward extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('004_402_forward'))
        {
            Schema::create('004_402_forward', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id_402')->unsigned();
                $table->integer('form_id_402')->unsigned();
                $table->string('name_402', 100);
                $table->string('email_402', 50);
                $table->boolean('comments_402')->default(false);
                $table->boolean('states_402')->default(false);

                $table->foreign('form_id_402', 'fk01_004_402_forward')
                    ->references('id_401')
                    ->on('004_401_form')
                    ->onDelete('cascade')
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
        Schema::drop('004_402_forward');
    }
}