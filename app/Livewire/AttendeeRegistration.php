<?php

namespace App\Livewire;

use App\Livewire\Forms\AttendeeForm;
use App\Models\Career;
use App\Models\Workshop;
use Livewire\Component;

class AttendeeRegistration extends Component
{
	public AttendeeForm $form;

	public $careers = [];

	public $workshops = [];

	public function mount()
	{
		$this->careers = Career::select('name')->get()->toArray();
		$this->workshops = Workshop::select('name')->get()->toArray();
	}

	public function save()
	{
		$this->validate();

		$this->form->store();

		return $this->redirect('/confirmation');
	}

	public function render()
	{
		return view('livewire.attendee-registration');
	}
}
