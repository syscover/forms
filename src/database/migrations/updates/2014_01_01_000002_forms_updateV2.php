<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Syscover\Pulsar\Libraries\DBLibrary;


class FormsUpdateV2 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// change email_account_401
		DBLibrary::renameColumnWithForeignKey('004_401_form', 'email_account_401', 'email_account_id_401', 'INT', 10, true, false, 'fk01_004_401_form', '001_013_email_account', 'id_013');

		// change form_402
		DBLibrary::renameColumnWithForeignKey('004_402_forward', 'form_402', 'form_id_402', 'INT', 10, true, false, 'fk01_004_402_forward', '004_401_form', 'id_401', 'cascade', 'cascade');

		// change form_403
		DBLibrary::renameColumnWithForeignKey('004_403_record', 'form_403', 'form_id_403', 'INT', 10, true, false, 'fk01_004_403_record', '004_401_form', 'id_401', 'cascade', 'cascade');
		// change state_403
		DBLibrary::renameColumnWithForeignKey('004_403_record', 'state_403', 'state_id_403', 'INT', 10, true, true, 'fk02_004_403_record', '004_400_state', 'id_400');
		// change country_403
		DBLibrary::renameColumnWithForeignKey('004_403_record', 'country_403', 'country_id_403', 'VARCHAR', 2, false, true, 'fk03_004_403_record', '001_002_country', 'id_002');
		// change territorial_area_1_403
		DBLibrary::renameColumnWithForeignKey('004_403_record', 'territorial_area_1_403', 'territorial_area_1_id_403', 'VARCHAR', 6, false, true, 'fk04_004_403_record', '001_003_territorial_area_1', 'id_003');
		// change territorial_area_2_403
		DBLibrary::renameColumnWithForeignKey('004_403_record', 'territorial_area_2_403', 'territorial_area_2_id_403', 'VARCHAR', 10, false, true, 'fk05_004_403_record', '001_004_territorial_area_2', 'id_004');
		// change territorial_area_3_403
		DBLibrary::renameColumnWithForeignKey('004_403_record', 'territorial_area_3_403', 'territorial_area_3_id_403', 'VARCHAR', 10, false, true, 'fk06_004_403_record', '001_005_territorial_area_3', 'id_005');

		// change record_404
		DBLibrary::renameColumnWithForeignKey('004_404_comment', 'record_404', 'record_id_404', 'INT', 10, true, false, 'fk01_004_404_comment', '004_403_record', 'id_403', 'cascade', 'cascade');
		// change user_404
		DBLibrary::renameColumnWithForeignKey('004_404_comment', 'user_404', 'user_id_404', 'INT', 10, true, false, 'fk02_004_404_comment', '001_010_user', 'id_010');

		// change record_406
		DBLibrary::renameColumnWithForeignKey('004_406_recipient', 'record_406', 'record_id_406', 'INT', 10, true, false, 'fk01_004_406_recipient', '004_403_record', 'id_403', 'cascade', 'cascade');

		// change form_405
		DBLibrary::renameColumnWithForeignKey('004_405_message', 'form_405', 'form_id_405', 'INT', 10, true, false, 'fk01_004_405_message', '004_401_form', 'id_401', 'cascade', 'cascade');
		// change record_405
		DBLibrary::renameColumnWithForeignKey('004_405_message', 'record_405', 'record_id_405', 'INT', 10, true, false, 'fk02_004_405_message', '004_403_record', 'id_403', 'cascade', 'cascade');
		// change user_405
		DBLibrary::renameColumnWithForeignKey('004_405_message', 'user_405', 'user_id_405', 'INT', 10, true, true, 'fk03_004_405_message', '001_010_user', 'id_010');
		// change recipient_405
		DBLibrary::renameColumnWithForeignKey('004_405_message', 'recipient_405', 'recipient_id_405', 'INT', 10, true, false, 'fk04_004_405_message', '004_406_recipient', 'id_406', 'cascade', 'cascade');

		// rename columns
		// type_405
		DBLibrary::renameColumn('004_405_message', 'type_405', 'type_id_405', 'VARCHAR', 50, false, false);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}
}