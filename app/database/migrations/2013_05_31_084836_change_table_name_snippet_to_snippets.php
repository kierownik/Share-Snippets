<?php

use Illuminate\Database\Migrations\Migration;

class ChangeTableNameSnippetToSnippets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('snippet', 'snippets');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::rename('snippets', 'snippet');
	}

}