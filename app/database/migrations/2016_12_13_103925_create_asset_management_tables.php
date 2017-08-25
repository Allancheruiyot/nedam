<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetManagementTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create Asset Management Tables
		Schema::create('assets', function(Blueprint $table){
			$table->increments('id');
			$table->string('asset_name');
			$table->string('asset_number');
			$table->date('purchase_date');
			$table->double('purchase_price',15,2);
			$table->double('book_value',15,2);
			$table->date('warranty_expiry')->nullable();
			$table->string('serial_number')->nullable()->unique();
			$table->date('depreciation_start_date');
			$table->date('last_depreciated')->default('0000-00-00');
			$table->string('depreciation_method');
			$table->string('averaging_method');
			$table->double('salvage_value',15,2);
			$table->string('method');
			$table->double('rate',3,2)->nullable();
			$table->smallInteger('years')->nullable();
			$table->string('status')->default('new');
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
		// Drop Asse Management Tables
		Schema::drop('assets');
	}

}
