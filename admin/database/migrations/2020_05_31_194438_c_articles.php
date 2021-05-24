<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CArticles extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('articles', function (Blueprint $table) {
      $table->bigIncrements('id_article');
      $table->unsignedBigInteger('id_page_standard_field');
      $table->string('image', 255)->nullable();
      $table->integer('sort_order')->default(0);
      $table->boolean('visible')->default(0);
      $table->text('description')->nullable();
      $table->date('date')->nullable();
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
    Schema::dropIfExists('articles');
  }
}
