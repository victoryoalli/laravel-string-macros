<?php

namespace VictorYoalli\StringMacros\Macros\Str;

class StripTags
{
    public function __invoke()
    {
        return function ($subject) {
            return trim(strip_tags(nl2br($subject)));
        };
    }
}
