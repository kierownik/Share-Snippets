<?php

use Illuminate\Database\Migrations\Migration;

class AddTimestampsToSnippetTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('snippet', function($table)
    {
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('snippet', function($table)
    {
      $table->dropColumn('created_at');
      $table->dropColumn('updated_at');
    });
  }

}