<?php

namespace VictorYoalli\StringMacros\Macros\Str;

use Illuminate\Support\Str;

class ReadingMinutes
{
    public function __invoke()
    {
        return function ($subject, $wordsPerMinute = 200) {
            return intval(ceil(Str::wordCount(strip_tags($subject)) / $wordsPerMinute));
        };
    }
}
