<?php

namespace JefDigital\OAuth2\Client\Test\Provider;

use JefDigital\OAuth2\Client\Provider\FranceConnect;

class FranceConnectTest extends \PHPUnit_Framework_TestCase
{
    protected $provider;
    
    protected static function getMethod($name)
    {
        $class = new ReflectionClass('JefDigital\OAuth2\Client\Provider\FranceConnect');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
}
