<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $correo = new ContactoMailable($request);
        Mail::to('contacto@agendamalvinas.com.ar')->send($correo);

        return redirect()->route('donar')->with('info', 'Recibimos tu mensaje, vamos a responderte pronto.');
    }
}
