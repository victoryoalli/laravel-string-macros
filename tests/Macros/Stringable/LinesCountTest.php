<?php

namespace VictorYoalli\StringMacros\Tests\Macros\Stringable;

use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use VictorYoalli\StringMacros\Tests\TestCase;

class LinesCountTest extends TestCase
{
    #[Test]
    public function it_can_count_lines_fluently()
    {
        $count = Str::of("Line 1\nLine 2\nLine 3")->linesCount();
        $this->assertEquals('3', (string) $count);
    }

    #[Test]
    public function it_returns_stringable_instance()
    {
        $result = Str::of("Line 1\nLine 2")->linesCount();
        $this->assertInstanceOf(\Illuminate\Support\Stringable::class, $result);
    }
}
