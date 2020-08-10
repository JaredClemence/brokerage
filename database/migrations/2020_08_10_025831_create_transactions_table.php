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
            $table->string('type')->comment('Type of transaction: Residential, Commercial, Investment, etc.')->default('');
            $table->date('offer_date')->nullable();
            $table->date('acceptance_date')->nullable();
            $table->integer('inspection_contingency_duration')->nullable();
            $table->integer('appraisal_contingency_duration')->nullable();
            $table->integer('loan_contingency_duration')->nullable();
            $table->integer('owner_id')->nullable()->comment('Link to person who owns the transaction within the company.');
            $table->string('address')->comment('full postal address describing property. Can be copied from parcel data.')->default('');
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
