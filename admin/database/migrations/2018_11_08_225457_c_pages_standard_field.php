<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CPagesStandardField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_standard_field', function (Blueprint $table) {
            $table->bigIncrements('id_page_standard_field');
            $table->string('title', 255)->default('');
            $table->string('h1', 255)->default('');
            $table->string('meta_title', 255)->default('');
            $table->string('meta_description', 255)->default('');
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
        Schema::dropIfExists('pages_standard_field');
    }
}
