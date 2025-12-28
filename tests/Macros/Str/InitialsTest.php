<?php

namespace VictorYoalli\StringMacros\Tests\Macros\Str;

use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use VictorYoalli\StringMacros\Tests\TestCase;

class InitialsTest extends TestCase
{
    #[Test]
    public function it_can_return_words_initials_two_initials()
    {
        $str = Str::initials('Victor Yoalli Domínguez Torres');
        $this->assertEquals('VY', $str);
    }

    #[Test]
    public function it_can_return_n_initials()
    {
        $str = Str::initials('Victor Yoalli Domínguez Torres');
        $this->assertEquals('VY', $str);
    }

    #[Test]
    public function it_can_return_max_initials()
    {
        $str = Str::initials('Victor Yoalli Domínguez Torres', 10);
        $this->assertEquals('VYDT', $str);
    }

    #[Test]
    public function it_returns_original_string_when_number_is_zero()
    {
        $str = Str::initials('Victor Yoalli', 0);
        $this->assertEquals('Victor Yoalli', $str);
    }

    #[Test]
    public function it_handles_hyphenated_words()
    {
        // Hyphenated names are split into separate words
        $str = Str::initials('Jean-Pierre Dupont', 2);
        $this->assertEquals('JP', $str);

        $str = Str::initials('Jean-Pierre Dupont', 3);
        $this->assertEquals('JPD', $str);
    }

    #[Test]
    public function it_handles_underscored_words()
    {
        $str = Str::initials('hello_world_test', 3);
        $this->assertEquals('hwt', $str);
    }
}
