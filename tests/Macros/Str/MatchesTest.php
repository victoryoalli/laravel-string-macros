<?php
namespace VictorYoalli\StringMacros\Tests\Macros\Str;

use Illuminate\Support\Str;
use VictorYoalli\StringMacros\Tests\TestCase;

class MatchesTest extends TestCase
{
    /** @test */
    public function it_can_regex_match_str_test()
    {
        $result = Str::matches('/fooBar$/', 'todos-los_dias fooBar');
        $this->assertTrue($result);
    }
    /** @test */
    public function it_can_regex_match_str_of_test()
    {
        $result = Str::of('todos-los_dias fooBar')->matches('/fooBar$/');
        $this->assertTrue($result);
    }
}
