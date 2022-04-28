<?php

namespace controller;

use model\Model;
use controller\TopController;

class Controller
{
  /**
   * 
   */

  public function __construct()
  {
    new Model();
  }

  public static function render($viewUrl, $data = null)
  {
    include_once("view/$viewUrl.php");
  }

  public static function run($data)
  {
    $className = $data[0];
    $methodName = $data[1];

    try {
      self::getControllerInstance($className)->$methodName();
    } catch (\Throwable $th) {
      self::render(_ERR_503);
    }
  }

  /**
   * Undocumented function
   *
   * @param String $className
   * @return Controller
   */
  private static function getControllerInstance(
    String $className
  ): Controller {
    switch ($className) {
      case "TopController":
        return new TopController();
        break;
      case "BlogController":
        return new BlogController();
        break;
      default:
        self::render(_ERR_503);
        return null;
        break;
    }
  }
}