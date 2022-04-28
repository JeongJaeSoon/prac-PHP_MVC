<?php

const _ROUTES = [
  "/" => ["TopController", "index"],
  "/list" => ["BlogController", "index"],
  "/search" => ["BlogController", "search"],
  "/create" => ["BlogController", "create"],
  "/delete" => ["BlogController", "delete"],
];