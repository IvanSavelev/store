<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->unsignedBigInteger('id_page_standard_field');
	          $table->string('model', 255);
	          $table->string('image', 255)->nullable();
	          $table->decimal('price', 15, 4)->default(0.0000);
	          $table->text('description');
	          $table->boolean('visible');
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
        Schema::dropIfExists('products');
    }
}
