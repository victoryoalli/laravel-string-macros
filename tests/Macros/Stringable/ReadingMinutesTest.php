<?php

namespace VictorYoalli\StringMacros\Tests\Macros\Stringable;

use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use VictorYoalli\StringMacros\Tests\TestCase;

class ReadingMinutesTest extends TestCase
{
    #[Test]
    public function it_can_calculate_reading_minutes_fluently()
    {
        $minutes = Str::of('Hello world this is a test')->readingMinutes();
        $this->assertEquals('1', (string) $minutes);
    }

    #[Test]
    public function it_accepts_custom_words_per_minute()
    {
        $words = implode(' ', array_fill(0, 100, 'word'));
        $minutes = Str::of($words)->readingMinutes(100);
        $this->assertEquals('1', (string) $minutes);
    }

    #[Test]
    public function it_returns_stringable_instance()
    {
        $result = Str::of('Hello world')->readingMinutes();
        $this->assertInstanceOf(\Illuminate\Support\Stringable::class, $result);
    }
}
