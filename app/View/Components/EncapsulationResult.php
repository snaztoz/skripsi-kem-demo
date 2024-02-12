<?php

namespace App\View\Components;

use App\Dto\Encapsulation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EncapsulationResult extends Component
{
    public function __construct(
        public ?Encapsulation $encapsulationResult = null,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.encapsulation-result');
    }

    public function shouldRender(): bool
    {
        return ! is_null($this->encapsulationResult);
    }
}
