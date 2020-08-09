<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_forms', function (Blueprint $table) {
            /* @var $table Illuminate\Database\Schema\Blueprint */
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('short')->default('');
            $table->integer('file_content_id')->nullable();
            $table->date('revised_on');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_forms');
    }
}
