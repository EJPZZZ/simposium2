<?php

namespace App\Livewire\Forms;

use App\Mail\AttendeeRegistrationDone;
use App\Models\Attendee;
use App\Models\Career;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Str;

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

	#[Rule('required', as: 'tipo')]
	public $type = '';

	public function store()
	{
		$attendee = Attendee::create([
			'curp' => $this->curp,
			'name' => $this->name,
			'email' => $this->email,
			'code' => $this->code ?? null,
			'phone_number' => $this->phone_number,
			'semester' => ($this->semester == '') ?? 0,
			'career_id' => (Career::where('name', $this->career)->first()->id) ?? null,
			'workshop_id' => Workshop::where('name', $this->workshop)->first()->id,
		]);

		Mail::to($attendee->email)->send(new AttendeeRegistrationDone($attendee));

		DB::table('attendee_certificate_tokens')
			->insert([
				'email' => $this->email,
				'token' => Str::random(64),
				'created_at' => now(),
				'updated_at' => now(),
			]);

		$this->reset();
	}
}
