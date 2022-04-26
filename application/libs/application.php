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
    $request_url = $_SERVER['REQUEST_URI'];
    $url = explode("?", $request_url)[0];


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