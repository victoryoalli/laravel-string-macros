<?php

namespace VictorYoalli\StringMacros;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class StringMacrosServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        Collection::make($this->strMacros())
            ->reject(fn ($class, $macro) => Str::hasMacro($macro))
            ->each(fn ($class, $macro) => Str::macro($macro, app($class)()));
        Collection::make($this->stringableMacros())
            ->reject(fn ($class, $macro) => Stringable::hasMacro($macro))
            ->each(fn ($class, $macro) => Stringable::macro($macro, app($class)()));
    }

    protected function strMacros()
    {
        return [
            'human' => \VictorYoalli\StringMacros\Macros\Str\Human::class,
            'initials' => \VictorYoalli\StringMacros\Macros\Str\Initials::class,
            'interpolate' => \VictorYoalli\StringMacros\Macros\Str\Interpolate::class,
            'linesCount' => \VictorYoalli\StringMacros\Macros\Str\LinesCount::class,
            'matches' => \VictorYoalli\StringMacros\Macros\Str\Matches::class,
            'readingMinutes' => \VictorYoalli\StringMacros\Macros\Str\ReadingMinutes::class,
            'stripTags' => \VictorYoalli\StringMacros\Macros\Str\StripTags::class,
        ];
    }
    protected function stringableMacros()
    {
        return [
            'human' => \VictorYoalli\StringMacros\Macros\Stringable\Human::class,
            'initials' => \VictorYoalli\StringMacros\Macros\Stringable\Initials::class,
            'interpolate' => \VictorYoalli\StringMacros\Macros\Stringable\Interpolate::class,
            'linesCount' => \VictorYoalli\StringMacros\Macros\Stringable\LinesCount::class,
            'matches' => \VictorYoalli\StringMacros\Macros\Stringable\Matches::class,
            'readingMinutes' => \VictorYoalli\StringMacros\Macros\Stringable\ReadingMinutes::class,
            'stripTags' => \VictorYoalli\StringMacros\Macros\Stringable\StripTags::class,
        ];
    }
}
