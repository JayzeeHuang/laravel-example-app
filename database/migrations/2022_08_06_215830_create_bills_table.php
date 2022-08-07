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
        Schema::create('bills', function (Blueprint $table) {
            $table->id()->index();
            $table->string('sn')->unique()->index();
            $table->integer('user_id')->unsigned()->index();
			$table->string('id_code')->unique()->index()->nullable();

            $table->string('description')->nullable();
			$table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
			$table->float('lat', 10, 6)->nullable();
			$table->float('lng', 10, 6)->nullable();
			$table->string('address')->nullable();
			$table->string('suburb')->nullable();
			$table->string('city')->nullable();
			$table->string('country')->nullable();
			$table->string('postcode')->nullable();
			$table->string('cellphone')->nullable();

			$table->decimal('tax')->default(0.00);
			$table->decimal('transaction_fee')->default(0.00);
			$table->decimal('discount')->default(0.00);
			$table->decimal('insurance_fee')->default(0.00);
			$table->decimal('refund')->default(0.00);
			$table->decimal('total')->default(0.00);
			$table->decimal('paid')->default(0.00);
			$table->tinyInteger('status')->unsigned()->default(0);
			$table->tinyInteger('payment_status')->unsigned()->default(0);
            $table->timestamp('completed_at')->index()->nullable();

			$table->timestamps();
			$table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
