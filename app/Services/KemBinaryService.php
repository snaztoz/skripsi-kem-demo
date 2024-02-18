<?php

namespace App\Services;

use App\Dto\Encapsulation;
use App\Dto\Keypair;
use App\Repositories\KeyRepository;
use Illuminate\Support\Facades\Process;

class KemBinaryService implements KemService
{
    private string $bin;

    public function __construct(
        private KeyRepository $keyRepository,
    ) {
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
        $this->keyRepository->storePublicKey($publicKey);

        $command = collect([$this->bin, 'encapsulate']);
        if ($encoding === 'dna') {
            $command->push('--dna');
        }
        $command->push(storage_path('app/public.pem'));

        $result = Process::run($command->toArray())->output();
        $resultJson = json_decode($result, associative: true);

        return new Encapsulation($resultJson['sharedKey'], $resultJson['encapsulated']['value']);
    }

    public function decapsulate(string $privateKey, string $ciphertext): string
    {
        return 'some-secret';
    }
}
