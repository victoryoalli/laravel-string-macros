<?php

namespace VictorYoalli\StringMacros\Tests\Macros\Str;

use Illuminate\Support\Str;
use VictorYoalli\StringMacros\Tests\TestCase;

class InitialsTest extends TestCase
{

    /** @test */
    public function it_can_return_words_initials_two_initials()
    {
        $str = Str::initials('Victor Yoalli Domínguez Torres');
        $this->assertEquals('VY', $str);
    }
    /** @test */
    public function it_can_return_n_initials()
    {
        $str = Str::initials('Victor Yoalli Domínguez Torres');
        $this->assertEquals('VY', $str);
    }

    /** @test */
    public function it_can_return_max_initials()
    {
        $str = Str::initials('Victor Yoalli Domínguez Torres', 10);
        $this->assertEquals('VYDT', $str);
    }

    /** @test */
    public function it_can_return_lines_count()
    {
        $count = Str::linesCount("Victor\n Yoalli\n Domínguez\n Torres");
        $this->assertTrue($count == 4);
    }
}
