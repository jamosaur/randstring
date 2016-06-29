# randstring

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Random string generator make from colours, animals and numbers.

All code is PSR-2 friendly

## Install

Via Composer

``` bash
$ composer require jamosaur/randstring
```

## Usage

``` php
// Generate a random string.

$rand = new Jamosaur\Randstring\Randstring();
echo $rand->generate();
// buoyantwhitetippedreefshark56


// Generate a sentence case string that is no greater than 15 characters long.

$rand = new Jamosaur\Randstring\Randstring('sentence', 15);
echo $rand->generate();
// BumpySquirrel32


// Generate a string with the first letter in uppercase that is no greater than 20 characters long.

$rand = new Jamosaur\Randstring\Randstring('ucfirst', 20);
echo $rand->generate();
// Moistmountaincat75


// Generate a string with the first letter in uppercase that is no longer than 35 characters long with a random 
// number between 123 and 143.

$rand = new Jamosaur\Randstring\Randstring('ucfirst', 35, 123, 143);
echo $rand->generate();
// Tangibleindianrockpython127

// Generate a string formatted in camelCase

$rand = new Jamosaur\Randstring\Randstring('camel');
echo $rand->generate();
// carefulZebra23
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Credits

- [James Wallen-Jones][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jamosaur/randstring.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jamosaur/randstring/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jamosaur/randstring.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jamosaur/randstring.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jamosaur/randstring.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jamosaur/randstring
[link-travis]: https://travis-ci.org/jamosaur/randstring
[link-scrutinizer]: https://scrutinizer-ci.com/g/jamosaur/randstring/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/jamosaur/randstring
[link-downloads]: https://packagist.org/packages/jamosaur/randstring
[link-author]: https://github.com/jamosaur
[link-contributors]: ../../contributors
