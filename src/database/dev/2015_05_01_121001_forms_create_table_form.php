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
        Schema::create('004_400_form', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_400')->unsigned();
            $table->string('name_400', 100);
            $table->integer('mail_account_400')->unsigned();
            $table->tinyInteger('push_notification_400')->unsigned();

            // correos de reenvío

            $table->foreign('mail_account_400')->references('id_402')->on('004_402_mail_account')
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
        Schema::drop('004_400_form');
    }

}
