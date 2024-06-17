<?php

namespace App\Http\Controllers;

use App\Mail\FormularioContacto;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $menus = Menu::where('status', 1)->get();

        return view('public.contacto', compact('menus'));
    }

    public function enviarFormulario(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'author' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        try {
            // Obtener los datos del formulario
            $nombre = $request->input('author');
            $email = $request->input('email');
            $numero_personas = $request->input('phone');
            $fecha_aproximada = $request->input('subject');
            $mensaje = $request->input('comment');

            // Envía el correo electrónico
            Mail::send(new FormularioContacto($nombre, $email, $numero_personas, $fecha_aproximada, $mensaje));

            return back();
        } catch (\Exception $e) {
            // Registra el error y redirige con un mensaje de error
            logger()->error('Error al enviar el formulario: '.$e->getMessage());

            return redirect()->back()->with('error', 'Error al enviar el formulario. Por favor, inténtalo de nuevo.');
        }
    }
}
