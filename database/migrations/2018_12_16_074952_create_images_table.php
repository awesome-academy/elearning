<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_metas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('image_meta_id');
            $table->string('image_meta_type');
            $table->string('url', 1024);
            $table->string('title', 80)->nullable();
            $table->string('caption', 140)->nullable();
            $table->string('alt', 140)->nullable();
            $table->string('description', 140)->nullable();
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
        Schema::dropIfExists('image_metas');
    }
}
