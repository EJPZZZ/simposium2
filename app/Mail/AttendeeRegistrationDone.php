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
	public function __construct(protected Attendee $attendee)
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
				'attendeeName' => $this->attendee->name,
				'attendeeWorkshop' => $this->attendee->workshop->name,
				'workshopLocation' => $this->attendee->workshop->location,
				'attendeeToken' => $this->attendee->get_certificate_token(),
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
			// Attachment::fromData(fn () => QrCode::format('png')->size(200)->generate($this->attendee->get_certificate_token()), 'qrcode.png')
			// ->withMime('image/png')
		];
	}
}
