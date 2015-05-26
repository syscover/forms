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
        Schema::create('004_402_form', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_402')->unsigned();
            $table->string('name_402', 100);
            $table->integer('mail_account_402')->unsigned();
            $table->tinyInteger('push_notification_402')->unsigned();

            // correos de reenvío

            $table->foreign('mail_account_402')->references('id_400')->on('004_400_mail_account')
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
        Schema::drop('004_402_form');
    }

}
