<?php

namespace VictorYoalli\StringMacros\Macros\Str;

class Matches
{
    public function __invoke()
    {
        return function ($regex, $subject) {
            return (bool) preg_match($regex, $subject) > 0;
        };
    }
}
