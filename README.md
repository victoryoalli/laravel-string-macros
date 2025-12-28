# Laravel String Macros

![GitHub release (latest by date)](https://img.shields.io/github/v/release/victoryoalli/laravel-string-macros)
![Packagist Downloads](https://img.shields.io/packagist/dt/victoryoalli/laravel-string-macros)

A collection of useful string macros for Laravel's `Str` and `Stringable` classes.

## Requirements

| Version | PHP | Laravel |
|---------|-----|---------|
| 2.1+ | ^8.2 | 10.x, 11.x, 12.x |
| 2.0 | ^8.1 | 10.x, 11.x |
| 1.x | ^8.0 | 8.x, 9.x, 10.x |

## Installation

```bash
composer require victoryoalli/laravel-string-macros
```

## Available Macros

All macros are available both as static methods on `Str` and as fluent methods on `Stringable`.

### initials

Gets the initials of the words you provide. Defaults to 2 initials.

```php
use Illuminate\Support\Str;

// Static usage
Str::initials('Victor Yoalli Dominguez');
// "VY"

Str::initials('Victor Yoalli Dominguez', 3);
// "VYD"

// Fluent usage
Str::of('Victor Yoalli Dominguez')->initials()->toString();
// "VY"

Str::of('Victor Yoalli Dominguez')->initials(3)->upper()->toString();
// "VYD"
```

**Note:** Words are split by spaces, commas, underscores, and hyphens. For example, `Jean-Pierre` is treated as two words.

### interpolate

Replaces `?` placeholders with the values you provide.

```php
use Illuminate\Support\Str;

// Static usage - multiple arguments
Str::interpolate('Roses are ? Violets are ?', 'RED', 'BLUE');
// "Roses are RED Violets are BLUE"

// Static usage - array
Str::interpolate('Roses are ? Violets are ?', ['RED', 'BLUE']);
// "Roses are RED Violets are BLUE"

// Static usage - spread operator
Str::interpolate('Roses are ? Violets are ?', ...['RED', 'BLUE']);
// "Roses are RED Violets are BLUE"

// Fluent usage
Str::of('Hello ? and ?')->interpolate(['World', 'Universe'])->toString();
// "Hello World and Universe"
```

### readingMinutes

Calculates how many minutes it takes to read the text. Accepts HTML (tags are stripped for accurate calculation). Default reading speed is 200 words per minute.

```php
use Illuminate\Support\Str;

// Static usage
Str::readingMinutes('Your long article text here...');
// 1

// With custom words per minute
Str::readingMinutes($longText, 150);
// 3

// Fluent usage
Str::of('<p>HTML content</p>')->readingMinutes()->toString();
// "1"
```

### linesCount

Counts the number of lines in a string (splits by `\n` or `\r`).

```php
use Illuminate\Support\Str;

// Static usage
Str::linesCount("Line 1\nLine 2\nLine 3");
// 3

// Fluent usage
Str::of("Hello\nWorld")->linesCount()->toString();
// "2"
```

## Fluent Chaining

All macros can be chained with other `Stringable` methods:

```php
use Illuminate\Support\Str;

$result = Str::of('? ? ?')
    ->interpolate(['Victor', 'Yoalli', 'Dominguez'])
    ->initials(3)
    ->upper()
    ->toString();
// "VYD"
```

---

## Upgrading from v1.x to v2.x

### Breaking Changes

#### Removed Macros

The following macros have been **removed** because they are now available natively in Laravel 10+:

| Removed Macro | Use Instead | Available Since |
|---------------|-------------|-----------------|
| `Str::human($value)` | `Str::headline($value)` | Laravel 9.x |
| `Str::matches($pattern, $value)` | `Str::isMatch($pattern, $value)` | Laravel 10.x |

#### Migration Examples

**Before (v1.x):**
```php
// human() - converts to human readable format
Str::human('hello_world');  // "hello world"
Str::of('hello_world')->human();

// matches() - check if string matches regex
Str::matches('/^hello/', 'hello world');  // true
Str::of('hello world')->matches('/^hello/');
```

**After (v2.x) - Use Laravel native methods:**
```php
// headline() - converts to title case with spaces
Str::headline('hello_world');  // "Hello World"
Str::of('hello_world')->headline();

// isMatch() - check if string matches regex
Str::isMatch('/^hello/', 'hello world');  // true
Str::of('hello world')->isMatch('/^hello/');
```

**Note:** `Str::headline()` capitalizes each word, while the old `Str::human()` did not. If you need lowercase output, chain with `->lower()`:

```php
Str::of('hello_world')->headline()->lower()->toString();
// "hello world"
```

#### PHP and Laravel Version Requirements

| Requirement | v1.x | v2.0 | v2.1+ |
|-------------|------|------|-------|
| PHP | ^8.0 | ^8.1 | ^8.2 |
| Laravel | 8.x, 9.x, 10.x | 10.x, 11.x | 10.x, 11.x, 12.x |

### Upgrade Steps

1. **Update your `composer.json`** or run:
   ```bash
   composer require victoryoalli/laravel-string-macros:^2.0
   ```

2. **Search and replace** removed macros in your codebase:
   ```bash
   # Find usages of removed macros
   grep -r "Str::human\|->human(" app/
   grep -r "Str::matches\|->matches(" app/
   ```

3. **Replace with native Laravel methods:**
   - `Str::human()` → `Str::headline()`
   - `Str::matches()` → `Str::isMatch()`
   - `->human()` → `->headline()`
   - `->matches()` → `->isMatch()`

4. **Run your tests** to ensure everything works correctly.

---

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information about recent changes.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email victoryoalli@gmail.com instead of using the issue tracker.

## Credits

- [Victor Yoalli](https://github.com/victoryoalli)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
