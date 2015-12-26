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
        Schema::create('004_401_form', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_401')->unsigned();
            $table->string('name_401', 100);
            $table->integer('email_account_401')->unsigned();
            $table->boolean('push_notification_401')->default(false);
            $table->integer('n_unopened_401')->unsigned()->default(0);

            // correos de reenvío
            $table->foreign('email_account_401', 'fk01_004_401_form')->references('id_013')->on('001_013_email_account')
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
        Schema::drop('004_401_form');
    }

}
