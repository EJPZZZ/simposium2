<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('attendee_certificate_tokens', function (Blueprint $table) {
			$table->string('email')->primary();
			$table->string('token', 64)->unique();
			$table->timestamp('last_used_at')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('attendee_certificate_tokens');
	}
};
