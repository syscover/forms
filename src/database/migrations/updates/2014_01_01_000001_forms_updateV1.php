<?php

use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Models\Resource;


class FormsUpdateV1 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$resource = Resource::builder()->find('forms-master-tables');

		if($resource == null)
		{
			Resource::create([
				'id_007' 		=> 'forms-master-tables',
				'name_007' 		=> 'Master tables',
				'package_007'	=> '4'
			]);
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}
}