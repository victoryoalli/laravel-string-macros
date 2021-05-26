<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class Human
{
    public function __invoke()
    {
        return function () {
            return new static(Str::human($this->value));
        };
    }
}
