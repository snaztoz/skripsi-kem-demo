<?php

namespace App\Services;

use App\Dto\Keypair;

class KemService
{
    public function generateNewKeypair(string $alg): Keypair
    {
        if ($alg === 'kyber') {
            return new Keypair('some-kyber-public-key', 'some-kyber-private-key');
        } else {
            return new Keypair('some-rsa-public-key', 'some-rsa-private-key');
        }
    }
}
