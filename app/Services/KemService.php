<?php

namespace App\Services;

use App\Dto\Encapsulation;
use App\Dto\Keypair;

interface KemService
{
    public function generateKeypair(string $alg): Keypair;

    public function encapsulate(string $publicKey, string $encoding): Encapsulation;

    public function decapsulate(string $privateKey, string $ciphertext): string;
}
