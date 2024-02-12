<?php

namespace App\Http\Controllers;

use App\Services\KemService;
use Illuminate\Http\Request;

class KemController extends Controller
{
    public function __construct(
        protected KemService $kemService,
    ) {
    }

    public function keysGenerationPage()
    {
        return view('keys-generation', [
            'generationResult' => session('keypair'),
        ]);
    }

    public function keysGeneration(Request $request)
    {
        $validated = $request->validate([
            'algorithm' => ['required', 'in:kyber,rsa'],
        ]);

        $keypair = $this
            ->kemService
            ->generateNewKeypair($validated['algorithm']);

        return back()->with('keypair', $keypair);
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
