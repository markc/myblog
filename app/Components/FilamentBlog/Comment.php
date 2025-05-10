<?php

namespace App\Components\FilamentBlog;

use Illuminate\View\Component;

class Comment extends Component
{
    /**
     * {@inheritDoc}
     */
    public function render()
    {
        return view('filament-blog::components.comment');
    }
}
