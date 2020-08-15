<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class ReadingMinutes
{
    public function __invoke()
    {
        return function ($wordsPerMinute = 200) {
            return new static(Str::readingMinutes($this->value, $wordsPerMinute));
        };
    }
}
