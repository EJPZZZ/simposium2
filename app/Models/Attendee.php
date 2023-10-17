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
			->update([
				'expires_at' => $date
			]);
	}

	public function set_token_allowed_date(string $date): void
	{
		DB::table('attendee_certificate_tokens')
			->update([
				'allowed_date' => $date
			]);
	}

	public static function verify_token(string $token)
	{
		try {
			$attendee_data = DB::table('attendee_certificate_tokens')
				->where('token', '=', $token)
				->select('allowed_date', 'email')
				->first();

			$formated_date = Carbon::createFromFormat('Y-m-d H:i:s', $attendee_data->allowed_date);

			if ($formated_date->gt(Carbon::now())) abort(404);
			return $attendee_data->email;
		} catch (\Throwable $th) {
			abort(404);
		}
	}
}
