<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
        $director = Staff::where('rol', 'director')->get();
        $editor = Staff::where('rol', 'editor')->get();
        $desarrollo = Staff::where('rol', 'desarrollo')->get();
        $relaciones = Staff::where('rol', 'relaciones')->get();
        $redes = Staff::where('rol', 'redes')->get(); 
        
        return view('staff', compact('director', 'editor', 'redes', 'desarrollo', 'relaciones'));
    }
}
