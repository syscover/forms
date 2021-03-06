<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsCreateTableRecord extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('004_403_record'))
        {
            Schema::create('004_403_record', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id_403')->unsigned();
                $table->integer('form_id_403')->unsigned();
                $table->integer('date_403')->unsigned();
                $table->string('date_text_403', 25);
                $table->integer('state_id_403')->unsigned()->nullable();
                $table->string('subject_403', 255)->nullable();
                $table->string('company_403', 100)->nullable();
                $table->string('name_403', 50)->nullable();
                $table->string('surname_403', 50)->nullable();
                $table->string('email_403', 100)->nullable();
                $table->string('country_id_403', 2)->nullable();
                $table->string('territorial_area_1_id_403', 6)->nullable();
                $table->string('territorial_area_2_id_403', 10)->nullable();
                $table->string('territorial_area_3_id_403', 10)->nullable();
                $table->boolean('opened_403')->default(false);
                $table->boolean('dispatched_403')->default(false);
                $table->text('data_403');

                $table->foreign('form_id_403', 'fk01_004_403_record')
                    ->references('id_401')
                    ->on('004_401_form')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('state_id_403', 'fk02_004_403_record')
                    ->references('id_400')
                    ->on('004_400_state')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('country_id_403', 'fk03_004_403_record')
                    ->references('id_002')
                    ->on('001_002_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_1_id_403', 'fk04_004_403_record')
                    ->references('id_003')
                    ->on('001_003_territorial_area_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_2_id_403', 'fk05_004_403_record')
                    ->references('id_004')
                    ->on('001_004_territorial_area_2')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_3_id_403', 'fk06_004_403_record')
                    ->references('id_005')
                    ->on('001_005_territorial_area_3')
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
        Schema::drop('004_403_record');
    }
}