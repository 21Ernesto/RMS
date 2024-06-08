<?php

namespace App\Mail;

use App\Models\PurchasePromo;
use App\Models\PurchaseViaje;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CorreoAdminPromos extends Mailable
{
    use Queueable, SerializesModels;

    public $purchase;

    public function __construct(PurchasePromo $purchase)
    {
        $this->purchase = $purchase;
    }

    public function build()
    {
        try {
            return $this->view('public.email.notificacion_admin_promos')->with('purchase', $this->purchase);
    
        } catch (\Exception $e) {
            Log::error('Error al construir el correo electrónico: ' . $e->getMessage());
        }
    }
}
