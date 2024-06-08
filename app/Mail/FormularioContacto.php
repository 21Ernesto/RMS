<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormularioContacto extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;

    public $email;

    public $numero_personas;

    public $fecha_aproximada;

    public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $email, $numero_personas, $fecha_aproximada, $mensaje)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->numero_personas = $numero_personas;
        $this->fecha_aproximada = $fecha_aproximada;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('public.email.formulario')
            ->subject('Nuevo formulario de contacto')
            ->to('zading2023@gmail.com');
    }
}
