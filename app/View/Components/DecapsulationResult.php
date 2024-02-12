<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DecapsulationResult extends Component
{
    public function __construct(
        public ?string $decapsulationResult,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.decapsulation-result');
    }

    public function shouldRender(): bool
    {
        return ! is_null($this->decapsulationResult);
    }
}
