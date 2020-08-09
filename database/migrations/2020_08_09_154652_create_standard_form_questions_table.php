<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardFormQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standard_form_questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('sort_order')->nullable();
            $table->string('short');
            $table->string('question');
            $table->string('data_type');
            $table->string('answer_name');
            $table->text('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standard_form_questions');
    }
}
