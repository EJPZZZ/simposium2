<?php

namespace App\Livewire\Forms;

use App\Mail\AttendeeRegistrationDone;
use App\Models\Attendee;
use App\Models\Career;
use App\Models\Institution;
use App\Models\Workshop;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Rule;
use Livewire\Form;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendeeForm extends Form
{
	#[Rule('string|max:18|unique:attendees,curp|required',	as: 'curp')]
	public $curp = '';

	#[Rule('string|max:255|required',	as: 'nombre')]
	public $name = '';

	#[Rule('string|max:255|email:filter|unique:attendees,email|required',	as: 'correo electrónico')]
	public $email = '';

	#[Rule('string|max:10|nullable|unique:attendees,phone_number',	as: 'número telefónico')]
	public $phone_number = '';

	#[Rule('exists:workshops,name|required',	as: 'taller')]
	public $workshop = '';

	#[Rule('required_if:form.type,internal|string|max:255|sometimes|unique:attendees,code',	as: 'matrícula')]
	public $code = '';

	#[Rule('required_if:form.type,internal',	as: 'carrera', message: 'El campo carrera es obligatorio')]
	#[Rule('exists:careers,name',	as: 'carrera')]
	public $career = '';

	#[Rule('required_if:form.type,internal,numeric|gt:0|lte:13',	as: 'semestre')]
	public $semester = '';

	#[Rule('required|in:internal,external', as: 'tipo')]
	public $type = '';

	#[Rule('required|in:male,female,not_especified|string', as: 'género')]
	public $gender = '';

	#[Rule('required|mimes:jpg,jpeg,png|max:2048', as: 'recibo de pago')]
	public $image_file;

	#[Rule('required', as: 'institucion')]
	public $institution;

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
			'institution_id' => Institution::where('name', $this->institution)->first()->id,
			'career_id' => (Career::where('name', $this->career)->first()->id) ?? null,
			'workshop_id' => Workshop::where('name', $this->workshop)->first()->id,
		]);

		$path = $this->image_file
			->store('payment_images');

		$attendee->image()
			->create([
				'path' => $path,
			]);

		$token = $attendee->create_certificate_token();

		$qr = QrCode::format('png')->size(300)->generate($token);
		$qr = base64_encode($qr);

		Mail::to($attendee->email)
			->send(new AttendeeRegistrationDone($attendee, $qr));
			
		$this->reset();

		return $token;
	}
}
