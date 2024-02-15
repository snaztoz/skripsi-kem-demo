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
            ->generateKeypair($validated['algorithm']);

        return back()->with('keypair', $keypair);
    }

    public function encapsulationPage()
    {
        return view('encapsulation', [
            'encapsulationResult' => session('encapsulation'),
        ]);
    }

    public function encapsulate(Request $request)
    {
        $validated = $request->validate([
            'public-key' => ['required', 'string'],
            'encoding' => ['required', 'in:base64,dna'],
        ]);

        $encapsulation = $this
            ->kemService
            ->encapsulate($validated['public-key'], $validated['encoding']);

        return back()->with('encapsulation', $encapsulation);
    }

    public function decapsulationPage()
    {
        return view('decapsulation', [
            'decapsulationResult' => session('decapsulation'),
        ]);
    }

    public function decapsulate(Request $request)
    {
        $validated = $request->validate([
            'private-key' => ['required', 'string'],
            'ciphertext' => ['required', 'string'],
        ]);

        $decapsulation = $this
            ->kemService
            ->decapsulate($validated['private-key'], $validated['ciphertext']);

        return back()->with('decapsulation', $decapsulation);
    }
}
