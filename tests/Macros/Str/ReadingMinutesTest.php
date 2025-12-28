<?php

namespace VictorYoalli\StringMacros\Tests\Macros\Str;

use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use VictorYoalli\StringMacros\Tests\TestCase;

class ReadingMinutesTest extends TestCase
{
    #[Test]
    public function it_returns_one_minute_for_short_text()
    {
        $minutes = Str::readingMinutes('Hello world');
        $this->assertEquals(1, $minutes);
    }

    #[Test]
    public function it_calculates_reading_time_for_longer_text()
    {
        // 200 words = 1 minute (default)
        $words = implode(' ', array_fill(0, 400, 'word'));
        $minutes = Str::readingMinutes($words);
        $this->assertEquals(2, $minutes);
    }

    #[Test]
    public function it_accepts_custom_words_per_minute()
    {
        // 100 words at 100 wpm = 1 minute
        $words = implode(' ', array_fill(0, 100, 'word'));
        $minutes = Str::readingMinutes($words, 100);
        $this->assertEquals(1, $minutes);
    }

    #[Test]
    public function it_strips_html_tags_before_calculating()
    {
        $html = '<p>Hello</p> <strong>World</strong>';
        $minutes = Str::readingMinutes($html);
        $this->assertEquals(1, $minutes);
    }

    #[Test]
    public function it_rounds_up_to_nearest_minute()
    {
        // 201 words at 200 wpm should be 2 minutes (rounds up)
        $words = implode(' ', array_fill(0, 201, 'word'));
        $minutes = Str::readingMinutes($words);
        $this->assertEquals(2, $minutes);
    }

    #[Test]
    public function it_handles_empty_string()
    {
        $minutes = Str::readingMinutes('');
        $this->assertEquals(0, $minutes);
    }
}
