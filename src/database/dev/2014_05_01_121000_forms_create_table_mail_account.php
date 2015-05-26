<?php

use Illuminate\Database\Migrations\Migration;

class FormsCreateTableMailAccount extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('004_400_mail_account', function($table){
                $table->engine = 'InnoDB';
                $table->increments('id_400')->unsigned();
                $table->string('name_400',100);
                $table->string('email_400',100);
                $table->string('reply_to_400',100)->nullable();
                $table->string('host_smtp_400',100);
                $table->string('user_smtp_400',100);
                $table->string('pass_smtp_400',255);
                $table->smallInteger('port_smtp_400');
                $table->string('secure_smtp_400',5);                // null/TLS/SSL/SSLv2/SSLv3
                $table->string('host_inbox_400',100);
                $table->string('user_inbox_400',100);
                $table->string('pass_inbox_400',255);
                $table->smallInteger('port_inbox_400');
                $table->string('secure_inbox_400',5);               // null/SSL
                $table->string('type_inbox_400',5);                 // pop, imap, mbox
                $table->integer('n_emails_400')->unsigned();
                $table->integer('last_check_uid_400')->unsigned();  // field that records the last uid checked to see if there are more messages bounced check
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('004_400_mail_account');
	}
}