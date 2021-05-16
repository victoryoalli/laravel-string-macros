<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class LinesCount
{
    public function __invoke()
    {
        return function () {
            return new static(Str::linesCount($this->value));
        };
    }
}
