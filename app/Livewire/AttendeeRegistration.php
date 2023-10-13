<?php

namespace App\Livewire;

use App\Livewire\Forms\AttendeeForm;
use App\Models\Attendee;
use App\Models\Career;
use App\Models\Workshop;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AttendeeRegistration extends Component
{
	use WithFileUploads;

	public AttendeeForm $form;

	public $careers = [];

	public $workshops = [];

	public function mount()
	{
		$this->careers = Career::select('name')
			->get()
			->toArray();

		$this->workshops = Workshop::select('id', 'name', 'capacity')
			->get()
			->filter(function ($workshop) {
				if (Attendee::where('workshop_id', $workshop->id)->count() < $workshop->capacity) return $workshop;
			})
			->toArray();
	}

	public function save()
	{
		$this->validate();

		$token = $this->form->store();

		return $this->redirect('/confirmation/' . $token, navigate: true);
	}

	public function render()
	{
		return view('livewire.attendee-registration');
	}
}
