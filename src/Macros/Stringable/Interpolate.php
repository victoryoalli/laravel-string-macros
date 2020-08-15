<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class Interpolate
{
    public function __invoke()
    {
        return function ($values) {
            return new static(Str::interpolate($this->value, $values));
        };
    }
}
