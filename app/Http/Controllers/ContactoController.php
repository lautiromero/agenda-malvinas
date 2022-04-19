<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $correo = new ContactoMailable($request);
        Mail::to('casacorrea50@gmail.com')->send($correo);

        return redirect()->route('donar')->with('info', 'Recibimos tu mensaje, vamos a responderte pronto.');
    }
}
