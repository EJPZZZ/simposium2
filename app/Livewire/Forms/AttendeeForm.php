<?php

namespace App\Livewire\Forms;

use App\Mail\AttendeeRegistrationDone;
use App\Models\Attendee;
use App\Models\Career;
use App\Models\Workshop;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Rule;
use Livewire\Form;

class AttendeeForm extends Form
{
	#[Rule('string|max:255|unique:attendees,code|required',	as: 'matrícula')]
	public $code = '';

	#[Rule('string|max:255|required',	as: 'nombre')]
	public $name = '';

	#[Rule('string|max:255|email:filter|unique:attendees,email|required',	as: 'correo electrónico')]
	public $email = '';

	#[Rule('string|max:10|required|unique:attendees,phone_number',	as: 'número telefónico')]
	public $phone_number = '';

	#[Rule('exists:careers,name|required',	as: 'carrera')]
	public $career = '';

	#[Rule('max:13|numeric|required',	as: 'semestre')]
	public $semester = '';

	#[Rule('exists:workshops,name|required',	as: 'taller')]
	public $workshop = '';

	public function store()
	{
		$attendee = Attendee::create([
			'name' => $this->name,
			'email' => $this->email,
			'code' => $this->code,
			'phone_number' => $this->phone_number,
			'semester' => $this->semester,
			'career_id' => Career::where('name', $this->career)->first()->id,
			'workshop_id' => Workshop::where('name', $this->workshop)->first()->id,
		]);

		Mail::to($attendee->email)->send(new AttendeeRegistrationDone($attendee));

		$this->reset();
	}
}
