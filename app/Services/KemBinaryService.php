<?php

namespace App\Services;

use App\Dto\Encapsulation;
use App\Dto\Keypair;
use Illuminate\Support\Facades\Process;

class KemBinaryService implements KemService
{
    private string $bin;

    public function __construct()
    {
        $this->bin = storage_path('app/bin/kem');
    }

    public function generateKeypair(string $alg = 'kyber'): Keypair
    {
        $command = collect([$this->bin, 'gen-keypair']);
        if ($alg === 'rsa') {
            $command->push('--rsa');
        }

        $result = Process::run($command->toArray())->output();
        $resultJson = json_decode($result, associative: true);

        return new Keypair($resultJson['publicKey'], $resultJson['privateKey']);
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
