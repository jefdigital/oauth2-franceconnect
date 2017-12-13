<?php

namespace JefDigital\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class FranceConnectResourceOwner implements ResourceOwnerInterface
{
    /**
     * Raw response
     *
     * @var
     */
    protected $response;

    /**
     * Creates new resource owner.
     *
     * @param $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Get resource owner id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->response['sub'] ?: null;
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->response;
    }

    /**
     * Get resource owner email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->response['email'] ?: null;
    }

    /**
     * Get resource owner gender
     *
     * @return string|null
     */
    public function getGender()
    {
        return $this->response['gender'] ?: null;
    }

    /**
     * Get resource owner given name
     *
     * @return string|null
     */
    public function getGivenName()
    {
        return $this->response['given_name'] ?: null;
    }

    /**
     * Get resource owner first name
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->response['first_name'] ?: null;
    }

    /**
     * Get resource owner birth date
     *
     * @return string|null
     */
    public function getBirthDate()
    {
        return $this->response['birthdate'] ?: null;
    }

    /**
     * Get resource owner birth place
     *
     * @return string|null
     */
    public function getBirthPlace()
    {
        return $this->response['birthplace'] ?: null;
    }

}
