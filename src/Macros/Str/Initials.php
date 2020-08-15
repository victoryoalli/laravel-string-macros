<?php
namespace VictorYoalli\StringMacros\Macros\Str;

class Initials
{
    public function __invoke()
    {
        return function ($subject, $number = 2) {
            if ($number < 1) {
                return $subject;
            }
            $words = preg_split("/[\s,_-]+/", $subject);
            $number = (count($words) > $number)?$number:count($words);
            $acronym = '';
            for ($i = 0; $i < $number; $i++) {
                $acronym .= $words[$i][0];
            }

            return $acronym;
        };
    }
}
