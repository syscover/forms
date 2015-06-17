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
            $table->string('type_405', 50); // record, state, comment
            $table->integer('record_405')->unsigned();
            $table->integer('date_405')->unsigned();
            $table->integer('send_date_405')->unsigned()->nullable(); // date which the message went sent
            $table->boolean('dispatched_405')->default(false);
            $table->boolean('forward_405')->default(false); // check if is a forward contact
            $table->string('name_405', 100);
            $table->string('email_405', 50);
            $table->integer('form_405')->unsigned();
            $table->string('name_form_405', 100);
            $table->string('name_state_405', 50);
            $table->string('color_state_405', 50);
            $table->text('names_405');
            $table->integer('user_405')->unsigned()->nullable();
            $table->boolean('permission_state_405')->default(false); // permission to change state
            $table->boolean('permission_comment_405')->default(false); // permission to create comment
            $table->boolean('permission_forward_405')->default(false); // permission to delete from forward
            $table->boolean('permission_record_405')->default(false); // permission to view record on Pulsar Form
            $table->string('template_405', 255);
            $table->string('text_template_405', 255);
            $table->text('data_405');

            $table->foreign('form_405')->references('id_401')->on('004_401_form')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('record_405')->references('id_403')->on('004_403_record')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_405')->references('id_010')->on('001_010_user')
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
        Schema::drop('004_405_message');
    }
}