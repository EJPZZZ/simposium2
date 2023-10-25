<?php

namespace App\Mail;

use App\Models\Attendee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendeeRegistrationDone extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 */
	public function __construct(protected Attendee $attendee, protected $pdf)
	{
	}

	/**
	 * Get the message envelope.
	 */
	public function envelope(): Envelope
	{
		return new Envelope(
			subject: 'Simposium Regional de Informática - Confirmamos tu registro al evento',
		);
	}

	/**
	 * Get the message content definition.
	 */
	public function content(): Content
	{
		return new Content(
			view: 'mails.registration.done',
			with: [
				'attendee_name' => $this->attendee->name,
				'attendee_workshop' => $this->attendee->workshop->name,
				'workshop_location' => $this->attendee->workshop->location,
				// 'attendee_token' => $this->attendee->get_certificate_token(),
				// 'attendee_qr' => $this->qr
				
			]
		);
	}

	/**
	 * Get the attachments for the message.
	 *
	 * @return array<int, \Illuminate\Mail\Mailables\Attachment>
	 */
	public function attachments(): array
	{
		return [
			Attachment::fromData(fn () => $this->pdf, 'ticket.pdf')
			->withMime('application/pdf')
		];
	}
}
