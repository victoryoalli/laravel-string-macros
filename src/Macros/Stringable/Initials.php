<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class Initials
{
    public function __invoke()
    {
        return function ($number = 2) {
            return new static(Str::initials($this->value, $number));
        };
    }
}
