<?php

namespace VictorYoalli\StringMacros\Macros\Str;

class WordsCount
{
    public function __invoke()
    {
        return function ($subject) {
            return str_word_count(strip_tags($subject));
        };
    }
}
