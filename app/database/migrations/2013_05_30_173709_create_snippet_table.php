<?php

use Illuminate\Database\Migrations\Migration;

class CreateSnippetTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('snippet', function($table){
        $table->increments('id');
        $table->string('name');
        $table->text('snippet');
        $table->string('language');
        $table->integer('public');
        $table->softDeletes();
        });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('snippet');
  }

}