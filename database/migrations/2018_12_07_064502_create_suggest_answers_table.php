<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateSuggestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggest_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('suggest_question_id');
            $table->foreign('suggest_question_id')->references('id')
                   ->on('suggest_questions')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
            $table->string('content_answer');
            $table->boolean('correct');
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
        Schema::dropIfExists('suggest_answers');
    }
}
