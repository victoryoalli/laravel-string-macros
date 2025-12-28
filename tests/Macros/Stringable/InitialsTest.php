<?php

namespace VictorYoalli\StringMacros\Tests\Macros\Stringable;

use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use VictorYoalli\StringMacros\Tests\TestCase;

class InitialsTest extends TestCase
{
    #[Test]
    public function it_can_get_initials_fluently()
    {
        $str = Str::of('Victor Yoalli Dominguez')->initials();
        $this->assertEquals('VY', (string) $str);
    }

    #[Test]
    public function it_can_get_custom_number_of_initials_fluently()
    {
        $str = Str::of('Victor Yoalli Dominguez')->initials(3);
        $this->assertEquals('VYD', (string) $str);
    }

    #[Test]
    public function it_can_chain_with_other_methods()
    {
        $str = Str::of('victor yoalli dominguez')->initials(3)->upper();
        $this->assertEquals('VYD', (string) $str);
    }
}
