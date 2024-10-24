<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debtors', function (Blueprint $table) {
            $table->id();
            $table->string('no_ic');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone_number');
            $table->double('loan_amount');
            $table->dateTime('loan_date_start');
            $table->dateTime('loan_date_end');
            $table->double('duration');
            $table->double('total_amount');
            $table->char('gender')->nullable();
            $table->string('status');
            $table->integer('payment_id');
            $table->integer('collector_id');
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
        Schema::dropIfExists('debtors');
    }
}
