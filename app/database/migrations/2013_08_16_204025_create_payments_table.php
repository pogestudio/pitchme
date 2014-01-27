<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('pitch_id')->references('id')->on('pitches');
            $table->string('transaction_id');
            $table->string('paypal_profile_id');
            $table->string('payment_success');
            $table->string('user_has_seen_success')->default(false);
            $table->integer('round');
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
		Schema::drop('payments');
	}

}
