<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

class KeyRepository
{
    public function storePublicKey(string $publicKey)
    {
        Storage::put('public.pem', $publicKey);
    }

    public function storePrivateKey(string $privateKey)
    {
        Storage::put('private.pem', $privateKey);
    }
}
