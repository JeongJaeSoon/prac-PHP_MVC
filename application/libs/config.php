<?php

function _CHECK_DATA($data)
{
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
}

function _GET_REQUEST_URI()
{
  $request_url = $_SERVER['REQUEST_URI'];
  $url = explode("?", $request_url)[0];

  return [$request_url, $url];
}

const _ERR_404 = "error/404";
const _ERR_503 = "error/503";