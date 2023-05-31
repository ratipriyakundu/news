<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        Schema::dropIfExists('page_builder');
        Schema::create('page_builder', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('section_order');
            $table->string('section_code');
=======
        Schema::create('page_builder', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('property_name');
            $table->string('property_description');
>>>>>>> 2a4fc60453b403165973040213c2c634ec5ad5db
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
<<<<<<< HEAD
        Schema::dropIfExists('page_builder');
=======
        Schema::dropIfExists('pages');
>>>>>>> 2a4fc60453b403165973040213c2c634ec5ad5db
    }
}
