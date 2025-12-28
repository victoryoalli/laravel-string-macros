# Changelog

All notable changes to `Laravel String Macros` will be documented in this file.

## 2.0.0 - 2025-12-27

### Added
- Support for Laravel 11.x
- Support for PHP 8.1, 8.2, and 8.3
- Comprehensive test suite (35 tests covering all macros)
- Tests for fluent `Stringable` usage

### Changed
- Minimum PHP version is now 8.1 (was 8.0)
- Minimum Laravel version is now 10.x (was 8.x)
- Updated `phpunit.xml.dist` for PHPUnit 10+
- Tests now use PHP 8 attributes (`#[Test]`) instead of docblock annotations

### Removed
- **`Str::human()`** - Use `Str::headline()` instead (native in Laravel 9+)
- **`Str::matches()`** - Use `Str::isMatch()` instead (native in Laravel 10+)
- **`Str::of()->human()`** - Use `Str::of()->headline()` instead
- **`Str::of()->matches()`** - Use `Str::of()->isMatch()` instead
- Dropped support for Laravel 8.x and 9.x
- Dropped support for PHP 8.0

### Fixed
- Bug in `Stringable\Initials` that was incorrectly calling `Str::interpolate()` instead of `Str::initials()`

### Migration Guide

If upgrading from v1.x, replace removed macros with their Laravel native equivalents:

```php
// Before (v1.x)
Str::human('hello_world');
Str::matches('/pattern/', $subject);

// After (v2.x)
Str::headline('hello_world');
Str::isMatch('/pattern/', $subject);
```

See [README.md](README.md#upgrading-from-v1x-to-v2x) for detailed upgrade instructions.

## 1.0.0 - 2020-XX-XX

- Initial release
- Added `Str::initials()` macro
- Added `Str::interpolate()` macro
- Added `Str::readingMinutes()` macro
- Added `Str::linesCount()` macro
- Added `Str::human()` macro
- Added `Str::matches()` macro
- Added fluent `Stringable` support for all macros
