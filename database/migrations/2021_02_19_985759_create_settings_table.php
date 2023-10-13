<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('settings', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('sitename_en');
			$table->string('phone_number');
			$table->string('phone_number_2')->nullable();
			$table->string('phone_number_3')->nullable();
			$table->string('email')->nullable();
			$table->string('logo')->nullable();
			$table->string('icon')->nullable();
			$table->string('main_photo');
			$table->string('facebook')->nullable();
			$table->string('youtube')->nullable();
			$table->string('instagram')->nullable();
			$table->string('twitter')->nullable();
			$table->enum('system_status', ['open', 'close'])->default('open');
			$table->longtext('system_message')->nullable();
			$table->longtext('site_description')->nullable();
			$table->longtext('theme_setting')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('settings');
	}
}
