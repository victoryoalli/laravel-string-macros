<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class WordsCount
{
    public function __invoke()
    {
        return function () {
            return new static(Str::wordCount($this->value));
        };
    }
}
