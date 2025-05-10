<?php

namespace App\Components\FilamentBlog;

use Illuminate\View\Component;

class Card extends Component
{
    public function render()
    {
        return view('filament-blog::components.card');
    }
}
