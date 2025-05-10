<?php

namespace App\Providers\Filament\Themes;

use Illuminate\Contracts\Support\Htmlable;

class MyBlogTheme implements Htmlable
{
    public function __construct(
        protected ?string $layout = null,
    ) {}

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
