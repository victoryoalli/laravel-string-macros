# A set of useful Laravel string macros

![GitHub release (latest by date)](https://img.shields.io/github/v/release/victoryoalli/laravel-string-macros)
[![Total Downloads](https://img.shields.io/packagist/dt/victoryoalli/laravel-string-macros.svg?style=flat-square)](https://packagist.org/packages/victoryoalli/laravel-string-macros)
![Packagist Downloads](https://img.shields.io/packagist/dt/victoryoalli/laravel-string-macros)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require victoryoalli/laravel-string-macros
```

## Macros

- [A set of useful Laravel string macros](#a-set-of-useful-laravel-string-macros)
  - [Installation](#installation)
  - [Macros](#macros)
    - [Initials](#initials)
    - [Interpolate](#interpolate)
    - [readingMinutes](#readingminutes)
    - [stripTags](#striptags)
    - [wordsCount](#wordscount)
  - [Fluent String supported](#fluent-string-supported)
  - [Testing](#testing)
  - [Changelog](#changelog)
  - [Contributing](#contributing)
  - [Security](#security)
  - [Credits](#credits)
  - [License](#license)

### Initials
Gets the initicals of the words you provide. It defaults to 2 initials.
``` php
Str::initials('Victor Yoalli Dominguez'); //default to 2 initials
// VY

Str::initials('Victor Yoalli Dominguez',3);
// VYD
```

### Interpolate
Replaces question mark symbol to the words that you provide.
``` php
Str::interpolate('Roses are ? Violets are ?','RED','BLUE');
// Roses are RED Violets are BLUE

Str::interpolate('Roses are ? Violets are ?',['RED','BLUE']);
// Roses are RED Violets are BLUE

Str::interpolate('Roses are ? Violets are ?',...['RED','BLUE']);
// Roses are RED Violets are BLUE
```
### readingMinutes
Calculates how many minutes it takes to read the text provided.
It accepts HTML too, it will strip tags to make an accurate calculation.
``` php
Str::readingMinutes('Roses are RED Violets are BLUE...');
// 1

Str::readingMinutes('Pellentesque purus imperdiet dis duis netus dapibus mattis adipiscing at ultricies, rutrum volutpat quam ex himenaeos consectetur fusce tempus nostra, mollis fermentum ac fringilla donec lobortis potenti eros pharetra...');
// 1
```

### stripTags
```php
Str::stripTags('<strong>Hello</strong> <i>World!</i>');
// Hello World!
```

### wordsCount
```php
Str::wordsCount('Hac non ipsum dolor nisi penatibus maecenas luctus purus rutrum, commodo leo sed ut lacinia gravida primis aliquet eget finibus, consequat sapien platea urna vehicula adipiscing est tortor.');
// 28
```

## Fluent String supported
Example
```php
$str = Str::of('Hac non ? dolor nisi penatibus maecenas luctus purus rutrum, ? leo sed ut lacinia gravida primis aliquet eget finibus, consequat sapien platea urna vehicula adipiscing est tortor.')->interpolate(['RED','BLUE'])->initials(28)->upper();
echo $str;
// HNRDNPMLPRBLSULGPAEFCSPUVAET

```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email victoryoalli@gmail.com instead of using the issue tracker.

## Credits

- [Victor Yoalli](https://github.com/victoryoalli)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
