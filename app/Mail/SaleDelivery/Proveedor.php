<?php

namespace App\Mail\SaleDelivery;

use App\Models\SaleDelivery;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class Proveedor extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;

    public function __construct(SaleDelivery $payment)
    {
        $this->payment = $payment;
    }

    public function build()
    {
        try {
            return $this->view('public.email.SaleDelivery.proveedor')->with('payment', $this->payment);

        } catch (\Exception $e) {
            Log::error('Error al construir el correo electrónico: '.$e->getMessage());
        }
    }
}
