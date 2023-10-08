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
		Schema::create('attendees', function (Blueprint $table) {
			$table->id();
			$table->string('code')->unique();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('phone_number')->unique();
			$table->integer('semester')->max(13);
			$table->foreignId('career_id')->constrained('careers')->cascadeOnDelete();
			$table->foreignId('workshop_id')->constrained('workshops')->cascadeOnDelete();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('attendees');
	}
};
