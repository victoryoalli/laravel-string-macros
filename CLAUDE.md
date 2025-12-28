# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Laravel String Macros is a PHP package that extends Laravel's `Str` and `Stringable` classes with additional utility methods. It uses Laravel's macro system to add methods like `initials`, `interpolate`, `readingMinutes`, and `linesCount`.

Requires PHP ^8.2 and Laravel 10.x, 11.x, or 12.x.

## Commands

```bash
# Run all tests
composer test

# Run a single test file
./vendor/bin/phpunit tests/Macros/Str/InitialsTest.php

# Run a specific test method
./vendor/bin/phpunit --filter it_can_return_words_initials_two_initials
```

## Architecture

### Macro Registration

The `StringMacrosServiceProvider` (src/StringMacrosServiceProvider.php) registers all macros on boot. It maintains two separate lists:
- `strMacros()` - registered on `Illuminate\Support\Str`
- `stringableMacros()` - registered on `Illuminate\Support\Stringable` for fluent chaining

Each macro is only registered if it doesn't already exist (uses `hasMacro` check).

### Directory Structure

```
src/
├── Macros/
│   ├── Str/           # Static Str::method() macros
│   │   ├── Initials.php
│   │   ├── Interpolate.php
│   │   ├── LinesCount.php
│   │   └── ReadingMinutes.php
│   └── Stringable/    # Fluent Str::of()->method() macros
│       ├── Initials.php
│       ├── Interpolate.php
│       ├── LinesCount.php
│       └── ReadingMinutes.php
└── StringMacrosServiceProvider.php

tests/
├── Macros/
│   ├── Str/           # Tests for static macros
│   └── Stringable/    # Tests for fluent macros
└── TestCase.php
```

### Adding New Macros

1. Create a class in `src/Macros/Str/` implementing `__invoke()` that returns a closure
2. Create a corresponding class in `src/Macros/Stringable/` for fluent string support
3. Register both in `StringMacrosServiceProvider` under `strMacros()` and `stringableMacros()`
4. Create tests in both `tests/Macros/Str/` and `tests/Macros/Stringable/`

### Macro Class Patterns

**Static macro (Str::method):**
```php
class MacroName
{
    public function __invoke()
    {
        return function ($subject, ...$args) {
            // implementation - $subject is the string to operate on
            return $result;
        };
    }
}
```

**Fluent macro (Str::of()->method):**
```php
class MacroName
{
    public function __invoke()
    {
        return function (...$args) {
            // $this->value contains the string
            return new static(Str::macroName($this->value, ...$args));
        };
    }
}
```

### Testing

Tests extend `VictorYoalli\StringMacros\Tests\TestCase` which bootstraps the macros by instantiating the service provider without constructor.

Use PHPUnit attributes for test methods:
```php
use PHPUnit\Framework\Attributes\Test;

#[Test]
public function it_does_something()
{
    // test code
}
```

## Important Notes

- When adding macros, check if Laravel already provides the functionality natively (see Str and Stringable documentation)
- The `hasMacro` check prevents overriding existing macros, including native Laravel methods
- Stringable macros must return `new static(...)` to maintain chainability
