<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class StripTags
{
    public function __invoke()
    {
        return function ($allowed_tags = null) {
            return new static(Str::stripTags($this->value, $allowed_tags));
        };
    }
}
