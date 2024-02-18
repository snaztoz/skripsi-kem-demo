<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

class KeyRepository
{
    public function storePublicKey(string $publicKey)
    {
        Storage::put('public.pem', $publicKey);
    }
}
