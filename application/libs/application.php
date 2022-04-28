<?php

namespace application\libs;

use controller\Controller;

class Application
{
  /**
   * 
   */
  public function __construct()
  {
    [$_, $url] = _GET_REQUEST_URI();

    if (self::validateUrl($url, _ROUTES)) {
      Controller::run(_ROUTES[$url]);
    }
  }

  private static function validateUrl(
    String $url,
    array $routes
  ): bool {

    $isKeyExists = array_key_exists($url, $routes);

    if ($isKeyExists) {
      return true;
    }

    Controller::render(_ERR_404);
    return false;
  }
}