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
        if(!Schema::hasTable('004_405_message'))
        {
            Schema::create('004_405_message', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id_405')->unsigned();
                $table->string('type_405', 50); // record, state, comment
                $table->integer('record_405')->unsigned();
                $table->integer('date_405')->unsigned();
                $table->integer('send_date_405')->unsigned()->nullable(); // date which the message went sent
                $table->boolean('dispatched_405')->default(false);
                $table->integer('recipient_405')->unsigned();
                $table->boolean('forward_405')->default(false); // check if is a forward contact
                $table->string('subject_405', 255);
                $table->string('name_405', 100);
                $table->string('email_405', 50);
                $table->integer('form_405')->unsigned();
                $table->integer('user_405')->unsigned()->nullable(); // if message is to Pulsar User we indicate your ID
                $table->string('template_405', 255);
                $table->string('text_template_405', 255);
                /**********************************************************************************************
                 *  JSON FIELDS
                 *
                 * name_form_405, name_state_405, color_state_405, name_old_state_405, color_old_state_405,
                 * names_405, permission_state_405, permission_comment_405, permission_forward_405,
                 * permission_record_405
                 *
                 **********************************************************************************************/
                $table->text('data_message_405');
                $table->text('data_405');

                $table->foreign('form_405', 'fk01_004_405_message')
                    ->references('id_401')
                    ->on('004_401_form')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('record_405', 'fk02_004_405_message')
                    ->references('id_403')
                    ->on('004_403_record')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('user_405', 'fk03_004_405_message')
                    ->references('id_010')
                    ->on('001_010_user')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('recipient_405', 'fk04_004_405_message')
                    ->references('id_406')
                    ->on('004_406_recipient')
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
        Schema::drop('004_405_message');
    }
}