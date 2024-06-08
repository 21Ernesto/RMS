<?php

namespace App\Mail;

use App\Models\Purchase;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CorreoAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function build()
    {
        try {
            return $this->view('public.email.notificacion_admin')->with('purchase', $this->purchase);
    
        } catch (\Exception $e) {
            Log::error('Error al construir el correo electrónico: ' . $e->getMessage());
        }
    }
}
