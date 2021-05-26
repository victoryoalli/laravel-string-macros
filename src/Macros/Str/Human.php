<?php
namespace VictorYoalli\StringMacros\Macros\Str;

class Human
{
    public function __invoke()
    {
        return function ($subject) {
            return preg_replace('/_|-/', ' ', $subject);
        };
    }
}
