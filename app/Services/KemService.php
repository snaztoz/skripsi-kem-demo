<?php

namespace App\Services;

use App\Dto\Encapsulation;
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

    public function encapsulate(string $publicKey, string $encoding): Encapsulation
    {
        if ($encoding === 'base64') {
            return new Encapsulation('some-secret', 'some-base64-encoded-ciphertext');
        } else {
            return new Encapsulation('some-secret', 'some-dna-encoded-ciphertext');
        }
    }

    public function decapsulate(string $privateKey, string $ciphertext): string
    {
        return 'some-secret';
    }
}
