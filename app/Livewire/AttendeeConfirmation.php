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
		if (!(bool) $email = Attendee::get_email_from_token($this->token)) {
			return false;
		};

		if ($attendee = Attendee::where('email', $email)->first()) {
			$this->attendee_name = $attendee->name;
			$this->workshop_name = $attendee->workshop->name;
		}
	}

	public function render()
	{
		return view('livewire.attendee-confirmation');
	}
}
