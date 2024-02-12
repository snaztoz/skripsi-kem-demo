<?php

namespace App\View\Components;

use App\Dto\Keypair;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KeysGenerationResult extends Component
{
    public function __construct(
        public ?Keypair $generationResult = null,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.keys-generation-result');
    }

    public function shouldRender(): bool
    {
        return ! is_null($this->generationResult);
    }
}
