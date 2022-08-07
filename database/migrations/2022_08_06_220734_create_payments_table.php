<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id()->unique()->index();
			$table->string('gateway');
			$table->string('transaction_ref_no')->index();
			$table->string('transaction_id')->nullable();
			$table->string('transaction_status')->nullable();
			$table->string('bank_name')->nullable();
			$table->string('bank_receipt')->nullable();
			$table->string('payer_first_name')->nullable();
			$table->string('payer_last_name')->nullable();
			$table->decimal('payment_amount');
			$table->decimal('paid_amount');
			$table->string('country')->nullable();
			$table->string('currency_code')->nullable();
			$table->string('payer_ip_address')->nullable();
			$table->timestamps();
        });

        Schema::create('bill_payment', function (Blueprint $table) {
            $table->id('id')->index();
            $table->unsignedBigInteger('bill_id')->index();
            $table->unsignedBigInteger('payment_id')->index();

            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');

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
        Schema::dropIfExists('bill_payment');
        Schema::dropIfExists('payments');
    }
};
