<?php

namespace VictorYoalli\StringMacros\Macros\Stringable;

use Illuminate\Support\Str;

class StripTags {

    public function __invoke()
    {
        return function(){
            return new static(Str::stripTags($this->value));
        };
    }
}
