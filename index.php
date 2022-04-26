<?php
require_once "application/libs/config.php";
require_once "application/vender/autoload.php";
require_once "application/routes.php";

use application\libs\Application;
use controller\Controller;

new Application();
new Controller();