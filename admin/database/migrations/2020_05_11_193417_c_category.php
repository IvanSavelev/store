<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id_category');
            $table->unsignedBigInteger('id_page_standard_field');
	          $table->string('image', 255)->nullable();
	          $table->unsignedBigInteger('id_parent')->default(0);
	          $table->integer('sort_order')->default(0);
	          $table->boolean('visible')->default(0);
		        $table->text('description')->nullable();
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
        Schema::dropIfExists('category');
    }
}
