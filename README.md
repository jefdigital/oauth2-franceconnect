# oauth2-franceconnect

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package provides France Connect OAuth 2.0 support for the PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).

## Install

Via Composer

``` bash
$ composer require jefdigital/oauth2-franceconnect
```

## Usage

Usage is the same as The League's OAuth client, using `\JefDigital\OAuth2\Client\Provider\FranceConnect` as the provider.

### Authorization Code Flow

```php
<?php

session_start();

$provider = new \JefDigital\OAuth2\Client\Provider\FranceConnect([
    'clientId'          => '{fc-client-id}',
    'clientSecret'      => '{fc-client-secret}',
    'redirectUri'       => 'https://example.com/callback-url',
]);

if (!isset($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: '.$authUrl);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {

        // We got an access token, let's now get the user's details
        $user = $provider->getResourceOwner($token);

        // Use these details to create a new profile
        printf('Hello %s!', $user->getGivenName());

    } catch (Exception $e) {

        // Failed to get user details
        exit('Oh dear...');
    }

    // Use this to interact with an API on the users behalf
    echo $token->getToken();
}

```

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

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
