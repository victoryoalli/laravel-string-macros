<?php

namespace VictorYoalli\StringMacros\Macros\Str;

class WordsCount
{
    public function __invoke()
    {
        return function ($subject) {
            return strval(str_word_count(strip_tags($subject)));
        };
    }
}
