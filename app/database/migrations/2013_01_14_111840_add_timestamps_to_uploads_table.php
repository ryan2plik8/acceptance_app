<?php

use Illuminate\Database\Migrations\Migration;

class AddTimestampsToUploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('uploads', function($table)
		{
    		$table->date('created_at');
    		$table->date('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::table('uploads', function($table)
		{
    		$table->dropColumn('created_at');
    		$table->dropColumn('updated_at');
		});
	}

}