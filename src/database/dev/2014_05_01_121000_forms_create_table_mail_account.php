<?php

use Illuminate\Database\Migrations\Migration;

class ComunikCreateTableCuenta extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('004_402_mail_account', function($table){
                $table->engine = 'InnoDB';
                $table->increments('id_402')->unsigned();
                $table->string('nombre_402',100);
                $table->string('email_402',100);
                $table->string('reply_to_402',100)->nullable();
                $table->string('host_smtp_402',100);
                $table->string('user_smtp_402',100);
                $table->string('pass_smtp_402',255);
                $table->smallInteger('port_smtp_402');
                $table->string('secure_smtp_402',5);                // null/TLS/SSL/SSLv2/SSLv3
                $table->string('host_inbox_402',100);
                $table->string('user_inbox_402',100);
                $table->string('pass_inbox_402',255);
                $table->smallInteger('port_inbox_402');
                $table->string('secure_inbox_402',5);               // null/SSL
                $table->string('type_inbox_402',5);                 // pop, imap, mbox
                $table->integer('n_emails_402')->unsigned();
                $table->integer('last_check_uid_402')->unsigned();  // campo que registra el último uid comprobado, para saber si hay más mensajes rebotados a comprobar
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('004_402_mail_account');
	}
}