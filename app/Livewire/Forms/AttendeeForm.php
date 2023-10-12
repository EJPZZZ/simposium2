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
	#[Rule('string|max:18|unique:attendees,curp|required',	as: 'curp')]
	public $curp = '';

	#[Rule('string|max:255|required',	as: 'nombre')]
	public $name = '';

	#[Rule('string|max:255|email:filter|unique:attendees,email|required',	as: 'correo electrónico')]
	public $email = '';

	#[Rule('string|max:10|required|unique:attendees,phone_number',	as: 'número telefónico')]
	public $phone_number = '';

	#[Rule('exists:workshops,name|required',	as: 'taller')]
	public $workshop = '';

	#[Rule('string|max:255|sometimes|unique:attendees,code',	as: 'matrícula')]
	#[Rule('required_if:form.type,internal',	as: 'matrícula', message: 'El campo matrícula es obligatorio')]
	public $code = '';

	#[Rule('exists:careers,name',	as: 'carrera')]
	#[Rule('required_if:form.type,internal',	as: 'carrera', message: 'El campo carrera es obligatorio')]

	public $career = '';

	#[Rule('max:13|numeric',	as: 'semestre')]
	#[Rule('required_if:form.type,internal',	as: 'semestre', message: 'El campo semestre es obligatorio')]

	public $semester = '';

	#[Rule('required|in:internal,external', as: 'tipo')]
	public $type = '';

	#[Rule('required|in:male,female,not_especified|string', as: 'género')]
	public $gender = '';

	#[Rule('required|mimes:jpg,jpeg,png|max:2048', as: 'recibo de pago')]
	public $image_file;

	public function store()
	{
		$attendee = Attendee::create([
			'curp' => $this->curp,
			'name' => $this->name,
			'email' => $this->email,
			'code' => $this->code ?: null,
			'phone_number' => $this->phone_number,
			'semester' => $this->semester ?: null,
			'gender' => $this->gender,
			'career_id' => (Career::where('name', $this->career)->first()->id) ?? null,
			'workshop_id' => Workshop::where('name', $this->workshop)->first()->id,
		]);

		$path = $this->image_file->store('payment_images');
		
		$attendee->image()->create([
			'path' => $path,
		]);

		Mail::to($attendee->email)->send(new AttendeeRegistrationDone($attendee));

		$token = $attendee->create_certificate_token();

		$this->reset();

		return $token;
	}
}
