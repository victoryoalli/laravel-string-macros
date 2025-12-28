<?php

namespace VictorYoalli\StringMacros\Tests\Macros\Str;

use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use VictorYoalli\StringMacros\Tests\TestCase;

class LinesCountTest extends TestCase
{
    #[Test]
    public function it_counts_lines_with_newline_separator()
    {
        $count = Str::linesCount("Line 1\nLine 2\nLine 3");
        $this->assertEquals(3, $count);
    }

    #[Test]
    public function it_counts_lines_with_carriage_return()
    {
        $count = Str::linesCount("Line 1\rLine 2\rLine 3");
        $this->assertEquals(3, $count);
    }

    #[Test]
    public function it_returns_one_for_single_line()
    {
        $count = Str::linesCount('Single line without breaks');
        $this->assertEquals(1, $count);
    }

    #[Test]
    public function it_handles_empty_string()
    {
        $count = Str::linesCount('');
        $this->assertEquals(1, $count);
    }

    #[Test]
    public function it_handles_mixed_line_endings()
    {
        $count = Str::linesCount("Line 1\nLine 2\rLine 3");
        $this->assertEquals(3, $count);
    }
}
