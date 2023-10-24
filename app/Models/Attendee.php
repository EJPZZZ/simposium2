<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\String_;

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
		'institution_id',
		'career_id',
		'workshop_id',
		'gender',
	];

	public function career(): BelongsTo
	{
		return $this->BelongsTo(Career::class);
	}

	public function workshop(): BelongsTo
	{
		return $this->belongsTo(Workshop::class);
	}

	public function institution(): BelongsTo
	{
		return $this->BelongsTo(Institution::class);
	}

	public function image(): HasOne
	{
		return $this->hasOne(Image::class);
	}

	public function create_certificate_token(): string
	{
		$token = Str::random(32);

		DB::table('attendee_certificate_tokens')
			->insert([
				'email' => $this->email,
				'token' => $token,
				'created_at' => now(),
			]);

		return $token;
	}

	public function get_certificate_token(): string
	{
		return DB::table('attendee_certificate_tokens')
			->where('email', '=', $this->email)
			->select('token')
			->pluck('token')
			->toArray()[0];
	}

	public static function get_email_from_token(String $token): array
	{
		return DB::table('attendee_certificate_tokens')
			->where('token', '=', $token)
			->select('email')
			->pluck('email')
			->toArray();
	}

	public function set_token_expiration_date(string $date): void
	{
		DB::table('attendee_certificate_tokens')
			->where('email', '=', $this->email)
			->update([
				'expires_at' => $date
			]);
	}

	public function set_token_allowed_date(string $date): void
	{
		DB::table('attendee_certificate_tokens')
			->where('email', '=', $this->email)
			->update([
				'allowed_date' => $date
			]);
	}

	public static function verify_token(string $token)
	{
		try {
			$attendee_data = DB::table('attendee_certificate_tokens')
				->where('token', '=', $token)
				->select('allowed_date', 'expires_at', 'email')
				->first();

			$formated_allowed_date = Carbon::createFromFormat('Y-m-d H:i:s', $attendee_data->allowed_date);
			$formated_expires_at = Carbon::createFromFormat('Y-m-d H:i:s', $attendee_data->expires_at);

			if ($formated_allowed_date->gt(Carbon::now()) or $formated_expires_at->lt(Carbon::now())) abort(404);
			return $attendee_data->email;
		} catch (\Throwable $th) {
			abort(404);
		}
	}

	public function verify_validation()
	{
		if ($this->validated == 0) return abort(404);
		return true;
	}
}
