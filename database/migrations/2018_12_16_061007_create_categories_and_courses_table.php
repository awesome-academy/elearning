<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesAndCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('_lft')->unsigned();
            $table->integer('_rgt')->unsigned();
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->char('root',20);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->unique(['slug', 'parent_id'],'categories_unique');
        });
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->integer('user_id')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->dateTime('released_at')->nullable();
            $table->enum('status', [1,2,3]);
            $table->timestamps();
            $table->unique(['slug'],'programs_unique');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->integer('user_id')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->dateTime('released_at')->nullable();
            $table->enum('status', [1,2,3]);
            $table->timestamps();
            $table->unique(['slug'],'courses_unique');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::create('course_program', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->integer('course_id')->unsigned();

            $table->unique(['program_id', 'course_id'],'course_program_unique');
            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
        Schema::create('categorizables', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('categorizable_id')->unsigned();
            $table->string('categorizable_type');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(['category_id', 'categorizable_id', 'categorizable_type'],
                'categorizable_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categorizables');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_program');
    }
}
