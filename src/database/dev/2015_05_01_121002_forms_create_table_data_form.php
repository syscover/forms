<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormsCreateTableDataForm extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('004_401_data_form', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_401')->unsigned();

            $table->integer('form_401')->unsigned();
            $table->string('subject_401', 100);
            $table->tinyInteger('state_401')->unsigned();

            $table->integer('date_401')->unsigned();

            $table->string('name_401', 50);
            $table->string('surmane_401', 50);
            $table->string('company_401', 100);

            $table->string('country_401', 2);
            $table->string('territorial_area_1_401', 6)->nullable();
            $table->string('territorial_area_2_401', 10)->nullable();
            $table->string('territorial_area_3_401', 10)->nullable();
            $table->string('cp_401', 10)->nullable();
            $table->string('locality_401', 100)->nullable();
            $table->string('address_401', 150)->nullable();

            $table->text('data_401');

            $table->foreign('form_401')->references('id_400')->on('004_400_form')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('country_401')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_401')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_401')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_401')->references('id_005')->on('001_005_territorial_area_3')
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
        Schema::drop('004_401_data_form');
    }

}
