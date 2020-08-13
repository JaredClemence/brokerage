<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('value')->nullable();
            $table->integer('parcel_id')->nullable();
            $table->integer('owner_id')->nullable()->comment('Link to person who owns the transaction within the company.');
            $table->string('type')->comment('Type of transaction: Residential, Commercial, Investment, etc.')->default('');
            $table->date('list_date')->nullable();
            $table->date('list_expiration')->nullable();
            $table->date('offer_date')->nullable();
            $table->date('acceptance_date')->nullable();
            $table->date('current_close_date')->nullable();
            $table->string('status')->default('');
            $table->integer('inspection_contingency_duration')->nullable();
            $table->integer('appraisal_contingency_duration')->nullable();
            $table->integer('loan_contingency_duration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
