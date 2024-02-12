<?php

namespace App\Dto;

class Encapsulation
{
    public function __construct(
        public string $secret,
        public string $ciphertext,
    ) {
    }
}
