<?php

namespace App\Http\Controllers;

class KemController extends Controller
{
    public function keysGenerationPage()
    {
        return view('keys-generation');
    }

    public function encapsulationPage()
    {
        return view('encapsulation');
    }

    public function decapsulationPage()
    {
        return view('decapsulation');
    }
}
