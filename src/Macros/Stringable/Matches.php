<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class Matches
{
    public function __invoke()
    {
        return function ($regex) {
            return (bool) new static(Str::matches($regex, $this->value));
        };
    }
}
