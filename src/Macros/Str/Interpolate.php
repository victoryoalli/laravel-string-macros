<?php

namespace VictorYoalli\StringMacros\Macros\Str;

class Interpolate
{
    public function __invoke()
    {
        return function ($subject, $values) {
            if ($values === '' || (is_array($values) && count($values) === 0)) {
                return $subject;
            }
            if (! is_array($values)) {
                $values = func_get_args();
                unset($values[0]);
            }
            foreach ($values as $val) {
                $subject = preg_replace('/\?/', $val, $subject, 1);
            }

            return $subject;
        };
    }
}
