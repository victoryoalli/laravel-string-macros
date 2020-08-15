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
            'interpolate' => \VictorYoalli\StringMacros\Macros\Str\Interpolate::class,
            'stripTags' => \VictorYoalli\StringMacros\Macros\Str\StripTags::class,
            'wordsCount' => \VictorYoalli\StringMacros\Macros\Str\WordsCount::class,
            'initials' => \VictorYoalli\StringMacros\Macros\Str\Initials::class,
            'readingMinutes' => \VictorYoalli\StringMacros\Macros\Str\ReadingMinutes::class,
        ];
    }
    protected function stringableMacros()
    {
        return [
            'interpolate' => \VictorYoalli\StringMacros\Macros\Stringable\Interpolate::class,
            'stripTags' => \VictorYoalli\StringMacros\Macros\Stringable\StripTags::class,
            'wordsCount' => \VictorYoalli\StringMacros\Macros\Stringable\WordsCount::class,
            'initials' => \VictorYoalli\StringMacros\Macros\Stringable\Initials::class,
            'readingMinutes' => \VictorYoalli\StringMacros\Macros\Stringable\ReadingMinutes::class,
        ];
    }
}
