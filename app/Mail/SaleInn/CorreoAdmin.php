<?php

namespace App\Mail\SaleInn;

use App\Models\SaleInn;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CorreoAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;

    public function __construct(SaleInn $payment)
    {
        $this->payment = $payment;
    }

    public function build()
    {
        try {
            return $this->view('public.email.SaleInn.notificacion_admin')->with('payment', $this->payment);
    
        } catch (\Exception $e) {
            Log::error('Error al construir el correo electrónico: ' . $e->getMessage());
        }
    }
}
