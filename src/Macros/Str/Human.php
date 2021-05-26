<?php
namespace VictorYoalli\StringMacros\Macros\Str;

use Illuminate\Support\Str;

class Human
{
    public function __invoke()
    {
        return function ($subject) {
            $subject = Str::snake($subject);

            return preg_replace('/_|-/', ' ', $subject);
        };
    }
}
