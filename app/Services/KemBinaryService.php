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

    public function generateKeypair(string $alg = 'kyber-512'): Keypair
    {
        [$alg, $securityLevel] = $this->explodeAlg($alg);

        $command = collect([$this->bin, 'gen-keypair']);
        if ($alg === 'rsa') {
            $command->push('--rsa');
        }
        $command->push("--sec-level=$securityLevel");

        $resultJson = Process::run($command->toArray())->output();
        $result = json_decode($resultJson, associative: true);

        return new Keypair($result['publicKey'], $result['privateKey']);
    }

    public function encapsulate(string $publicKey, string $encoding): Encapsulation
    {
        $this->keyRepository->storePublicKey($publicKey);

        $command = collect([$this->bin, 'encapsulate']);
        if ($encoding === 'dna') {
            $command->push('--dna');
        }
        $command->push(storage_path('app/public.pem'));

        $resultJson = Process::run($command->toArray())->output();
        $result = json_decode($resultJson, associative: true);

        return new Encapsulation($result['sharedKey'], $result['encapsulated']['value']);
    }

    public function decapsulate(string $privateKey, string $ciphertext): string
    {
        $this->keyRepository->storePrivateKey($privateKey);

        $command = [$this->bin, 'decapsulate', storage_path('app/private.pem')];

        $resultJson = Process::input($ciphertext)->run($command)->output();
        $result = json_decode($resultJson, associative: true);

        return $result['sharedKey'];
    }

    private function explodeAlg(string $alg): array
    {
        return match ($alg) {
            'kyber-512' => ['kyber', 1],
            'kyber-768' => ['kyber', 2],
            'kyber-1024' => ['kyber', 3],
            'rsa-3072' => ['rsa', 1],
            'rsa-7680' => ['rsa', 2],
            'rsa-15360' => ['rsa', 3],
            default => throw new \Exception("Invalid algorithm identifier: $alg"),
        };
    }
}
