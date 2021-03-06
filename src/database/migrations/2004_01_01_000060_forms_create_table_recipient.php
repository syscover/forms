<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsCreateTableRecipient extends Migration {

    /**
     * Registra los correos a los que enviar las notificaciones, puede variar respecto a los forward
     * ya que un usuario se puede dar de baja del hilo de conversación
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('004_406_recipient'))
        {
            Schema::create('004_406_recipient', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id_406')->unsigned();
                $table->integer('record_id_406')->unsigned();
                $table->boolean('forward_406')->default(false); // check if recipient is record like forward
                $table->string('name_406', 100);
                $table->string('email_406', 50);
                $table->boolean('comments_406')->default(false);
                $table->boolean('states_406')->default(false);

                $table->foreign('record_id_406', 'fk01_004_406_recipient')
                    ->references('id_403')
                    ->on('004_403_record')
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
        Schema::drop('004_406_recipient');
    }
}