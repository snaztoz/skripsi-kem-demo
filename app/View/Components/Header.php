<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public array $navs = [
        'keys-generation' => [
            'name' => 'Keys Generation',
            'path' => '/keys-generation',
        ],
        'encapsulation' => [
            'name' => 'Encapsulation',
            'path' => '/encapsulation',
        ],
        'decapsulation' => [
            'name' => 'Decapsulation',
            'path' => '/decapsulation',
        ],
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $currentPage,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
