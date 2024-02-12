<?php

namespace App\Dto;

class Keypair
{
    public function __construct(
        public string $publicKey,
        public string $privateKey,
    ) {
    }
}
