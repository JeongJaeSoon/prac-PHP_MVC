<?php
require_once "application/libs/config.php";
require_once "env.php";
require_once "application/vender/autoload.php";
require_once "application/routes.php";

use application\libs\Application;
use controller\Controller;

new Application();
new Controller();


// $tmp = str_replace('/application/libs', '', __DIR__);
// const TEST = $tmp;
// echo TEST;

?>

<link rel="stylesheet" href="./index.css">