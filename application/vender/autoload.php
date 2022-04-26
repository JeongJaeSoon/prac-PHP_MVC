<?php

spl_autoload_register(function ($class) {
  // TODO Add case::model
  // TODO Add case::controller

  $class = str_replace("\\", "/", $class);
  include "$class.php";
});