<?php
namespace VictorYoalli\StringMacros\Tests\Macros\Str;

use Illuminate\Support\Str;
use VictorYoalli\StringMacros\Tests\TestCase;

class HumanTest extends TestCase
{
    /** @test */
    public function it_can_convert_to_human_str_test()
    {
        $str = Str::human('todos-los_dias');
        $this->assertEquals('todos los dias', $str);
    }
    /** @test */
    public function it_can_convert_to_human_stringable_test()
    {
        $str = Str::of('todos-los_dias')->human();
        $this->assertEquals('todos los dias', $str);
    }
}
