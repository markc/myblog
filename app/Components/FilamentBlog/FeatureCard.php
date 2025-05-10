<?php

namespace App\Components\FilamentBlog;

use Illuminate\View\Component;

class FeatureCard extends Component
{
    public function render()
    {
        return view('filament-blog::components.feature-card');
    }
}
