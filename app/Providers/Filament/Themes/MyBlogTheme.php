<?php

namespace App\Providers\Filament\Themes;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class MyBlogTheme implements Htmlable
{
    public function __construct(
        protected ?string $layout = null,
    ) {
    }

    public function toHtml(): string
    {
        return view('filament.themes.myblog-theme', [
            'layout' => $this->getLayout(),
        ])->render();
    }
    
    public static function make(): static
    {
        return app(static::class);
    }
    
    public function getLayout(): string
    {
        return $this->layout ?? 'filament.layouts.app';
    }
    
    public function __toString(): string
    {
        return $this->toHtml();
    }
}