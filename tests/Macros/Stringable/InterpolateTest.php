<?php

namespace VictorYoalli\StringMacros\Tests\Macros\Stringable;

use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use VictorYoalli\StringMacros\Tests\TestCase;

class InterpolateTest extends TestCase
{
    #[Test]
    public function it_can_interpolate_fluently()
    {
        $str = Str::of('Hello ? and ?')->interpolate(['World', 'Universe']);
        $this->assertEquals('Hello World and Universe', (string) $str);
    }

    #[Test]
    public function it_can_chain_with_other_methods()
    {
        $str = Str::of('Hello ?')->interpolate(['World'])->upper();
        $this->assertEquals('HELLO WORLD', (string) $str);
    }

    #[Test]
    public function it_can_chain_multiple_macros()
    {
        $str = Str::of('? ? ?')
            ->interpolate(['Victor', 'Yoalli', 'Dominguez'])
            ->initials(3);
        $this->assertEquals('VYD', (string) $str);
    }
}
