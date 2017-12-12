# oauth2-franceconnect

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


Franceconnect OAuth 2.0 Client Provider for The PHP League OAuth2-Client.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require jefdigital/oauth2-franceconnect
```

## Usage

``` php
$skeleton = new JefDigital\OAuth2\Client();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@jefdigital.fr instead of using the issue tracker.

## Credits

- [JF Magnier][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jefdigital/oauth2-franceconnect.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jefdigital/oauth2-franceconnect/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jefdigital/oauth2-franceconnect.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jefdigital/oauth2-franceconnect.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jefdigital/oauth2-franceconnect.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jefdigital/oauth2-franceconnect
[link-travis]: https://travis-ci.org/jefdigital/oauth2-franceconnect
[link-scrutinizer]: https://scrutinizer-ci.com/g/jefdigital/oauth2-franceconnect/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/jefdigital/oauth2-franceconnect
[link-downloads]: https://packagist.org/packages/jefdigital/oauth2-franceconnect
[link-author]: https://github.com/jefdigital
[link-contributors]: ../../contributors
