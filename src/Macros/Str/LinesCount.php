<?php

namespace VictorYoalli\StringMacros\Macros\Str;

class LinesCount
{
    public function __invoke()
    {
        return function ($subject) {
            $lines = preg_split('/\n|\r/', $subject);

            return count($lines);
        };
    }
}
