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
        Schema::create('004_403_record', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_403')->unsigned();

            $table->integer('form_403')->unsigned();
            $table->string('subject_403', 100);
            $table->tinyInteger('state_403')->unsigned();

            $table->integer('date_403')->unsigned();

            $table->string('name_403', 50);
            $table->string('surmane_403', 50);
            $table->string('company_403', 100);

            $table->string('country_403', 2);
            $table->string('territorial_area_1_403', 6)->nullable();
            $table->string('territorial_area_2_403', 10)->nullable();
            $table->string('territorial_area_3_403', 10)->nullable();
            $table->string('cp_403', 10)->nullable();
            $table->string('locality_403', 100)->nullable();
            $table->string('address_403', 150)->nullable();

            $table->text('data_403');

            $table->foreign('form_403')->references('id_402')->on('004_402_form')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('state_403')->references('id_401')->on('004_401_state')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('country_403')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_403')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_403')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_403')->references('id_005')->on('001_005_territorial_area_3')
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
        Schema::drop('004_403_record');
    }

}
