<?php

namespace controller;

class BlogController extends Controller
{

  public function __construct()
  {
    // require_once("view/top_index.php");
  }

  public function index()
  {
    echo "index";
  }


  public function searchBlog()
  {
    isset($_GET["id"])
      ? $this->searchBlogId($_GET["id"])
      : $this->searchBlogAll();
  }

  private function searchBlogAll()
  {
    echo "searchBlogAll";
  }

  private function searchBlogId(
    int $id
  ) {
    echo "searchBlog {$id}";
  }
}