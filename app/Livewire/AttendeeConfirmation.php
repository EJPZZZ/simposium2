<?php

namespace App\Livewire;

use App\Models\Attendee;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AttendeeConfirmation extends Component
{
	public $token;

	public $attendee_name = null;
	public $workshop_name = null;

	public function mount()
	{
		$email = DB::table('attendee_certificate_tokens')
			->where('token', '=', $this->token)
			->select('email')
			->pluck('email')
			->toArray();

		if ($email == null) {
			return false;
		}
		
		$attendee = Attendee::where('email', $email)
			->first();

		if ($attendee) {
			$this->attendee_name = $attendee->name;
			$this->workshop_name = $attendee->workshop->name;
		}
	}

	public function render()
	{
		return view('livewire.attendee-confirmation');
	}
}
