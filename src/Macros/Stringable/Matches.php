<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class Matches
{
    public function __invoke()
    {
        return function ($regex) {
            $result = (new static(Str::matches($regex, $this->value)));

            return (bool)$result->value;
        };
    }
}
