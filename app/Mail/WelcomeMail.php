<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $name;// Variable para almacenar el nombre
    public $filePath; // Ruta del PDF


    public function __construct($name, $filePath)
    {
        $this->name = $name;
        $this->filePath = $filePath; // Guardamos la ruta del archivo
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome', // Vista del correo
            with: ['name' => $this->name], // Pasamos datos a la vista
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    // Lo añado yo 
    public function build()
    {
        return $this->from('lernik10@gmail.com', 'FitWorking Register Mail')
            ->subject('Bienvenido a nuestra aplicación')
            ->view('emails.welcome', ['name' => $this->name]) // Pasamos la variable a la vista
            ->attach($this->filePath, [
                'as' => 'Bienvenido.pdf', // Nombre del archivo adjunto
                'mime' => 'application/pdf', // Tipo de archivo
            ]);
    }
}
