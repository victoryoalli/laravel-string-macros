<?php

namespace VictorYoalli\StringMacros\Tests\Macros\Str;

use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use VictorYoalli\StringMacros\Tests\TestCase;

class InterpolateTest extends TestCase
{
    #[Test]
    public function it_can_interpolate_with_multiple_arguments()
    {
        $str = Str::interpolate('Roses are ? Violets are ?', 'RED', 'BLUE');
        $this->assertEquals('Roses are RED Violets are BLUE', $str);
    }

    #[Test]
    public function it_can_interpolate_with_array()
    {
        $str = Str::interpolate('Roses are ? Violets are ?', ['RED', 'BLUE']);
        $this->assertEquals('Roses are RED Violets are BLUE', $str);
    }

    #[Test]
    public function it_can_interpolate_with_spread_array()
    {
        $str = Str::interpolate('Roses are ? Violets are ?', ...['RED', 'BLUE']);
        $this->assertEquals('Roses are RED Violets are BLUE', $str);
    }

    #[Test]
    public function it_returns_original_string_when_no_values_provided()
    {
        $str = Str::interpolate('Hello ? World', []);
        $this->assertEquals('Hello ? World', $str);
    }

    #[Test]
    public function it_returns_original_string_when_empty_string_provided()
    {
        $str = Str::interpolate('Hello ? World', '');
        $this->assertEquals('Hello ? World', $str);
    }

    #[Test]
    public function it_replaces_only_available_placeholders()
    {
        $str = Str::interpolate('? ? ?', ['ONE', 'TWO']);
        $this->assertEquals('ONE TWO ?', $str);
    }

    #[Test]
    public function it_handles_single_placeholder()
    {
        $str = Str::interpolate('Hello ?!', 'World');
        $this->assertEquals('Hello World!', $str);
    }
}
