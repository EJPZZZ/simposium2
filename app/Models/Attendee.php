<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendee extends Model
{
    use HasFactory;

		protected $fillable = [
			'curp',
			'name',
			'email',
			'phone_number',
			'code',
			'semester',
			'career_id',
			'workshop_id',
		];

		public function career(): BelongsTo
		{
			return $this->BelongsTo(Career::class);
		}

		public function workshop(): BelongsTo
		{
			return $this->belongsTo(Workshop::class);
		}
}
