<?php

namespace JefDigital\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

use League\OAuth2\Client\Tool\BearerAuthorizationTrait;

use Psr\Http\Message\ResponseInterface;

/**
 * Class FranceConnect
 *
 * @author Jean-François MAGNIER <hello@jefdigital.fr>
 *
 * @package JefDigital\OAuth2\Client\Provider
 */
class FranceConnect extends AbstractProvider
{
  use BearerAuthorizationTrait;

  /**
   * @var string
   */
  protected $baseAuthorizationUrl;

  /**
   * @var string
   */
  protected $baseAccessTokenUrl;

  /**
   * @var string
   */
   protected $resourceOwnerDetailsUrl;

  /**
   * Returns the base URL for authorizing a client.
   *
   * @return string
   */
  public function getBaseAuthorizationUrl()
  {
      return $this->baseAuthorizationUrl;
  }

  /**
   * Returns the base URL for requesting an access token.
   *
   * @param array $params
   *
   * @return string
   */
  public function getBaseAccessTokenUrl(array $params)
  {
      return $this->baseAccessTokenUrl;
  }

  /**
   * Returns the URL for requesting the resource owner's details.
   *
   * @param AccessToken $token
   *
   * @return string
   */
  public function getResourceOwnerDetailsUrl(AccessToken $token)
  {
      return $this->resourceOwnerDetailsUrl;
  }

  /**
   * @return array
   */
  protected function getDefaultScopes()
  {
      return ['profile email address phone openid birth'];
  }

  /**
   * Create new resources owner using the generated access token.
   *
   * @param array       $response
   * @param AccessToken $token
   *
   * @return FranceConnectResourceOwner
   */
  protected function createResourceOwner(array $response, AccessToken $token)
  {
      return new FranceConnectResourceOwner($response);
  }

  /**
   * Check a provider response for errors.
   *
   * @param ResponseInterface $response
   * @param array|string $data
   *
   * @throws IdentityProviderException
   */
  protected function checkResponse(ResponseInterface $response, $data)
  {
      if ($response->getStatusCode() >= 400) {
          throw new IdentityProviderException(
              $data['message'] ?: $response->getReasonPhrase(),
              $response->getStatusCode(),
              $response
          );
      }
  }

  /**
   * Builds the authorization URL's query string.
   *
   * @param  array $params Query parameters
   * @return string Query string
   */
  protected function getAuthorizationQuery(array $params)
  {
    unset($params['approval_prompt']);
    return parent::getAuthorizationQuery($params);
  }

  /**
   * Builds the authorization URL.
   *
   * @param  array $options
   * @return string Authorization URL
   */
   public function getAuthorizationUrl(array $options = [])
   {
     $options['nonce'] = uniqid();
     return parent::getAuthorizationUrl($options);
   }


}
