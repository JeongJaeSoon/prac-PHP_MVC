<?php

namespace controller;

use model\Blog;

class BlogController extends Controller
{

  private $blog = null;

  public function __construct()
  {
    parent::__construct();
    $this->blog = new Blog();
  }

  /**
   * [public] index
   *  - URL : /list
   *  - Summary : Render blog list
   * 
   * @return void
   */
  public function index()
  {
    $items = $this->searchBlogAll();
    $this->render('components/blog/list', $items);
  }

  /**
   * [public] search
   *  - URL : /search
   *  - Summary : Render search form & result
   * 
   * @return void
   */
  public function search()
  {
    // The Data for search form screen(initial)
    $data = [];

    // The Data for search result screen
    if (isset($_GET['id'])) {
      $data = $this->searchBlogId($_GET['id']);
    }

    $this->render('components/blog/search', $data);
  }

  /**
   * [public] create
   *  - URL : /create
   *  - Summary : Render create form
   * 
   * @return void
   */
  public function create()
  {
    // The Data for create form screen(initial)
    $data = [];

    if (
      isset($_POST['title']) &&
      isset($_POST['overview']) &&
      isset($_POST['contents'])
    ) {
      // The Data for create result screen
      $data = $this->createBlog([
        "title" => $_POST['title'],
        "overview" => $_POST['overview'],
        "contents" => $_POST['contents']
      ]);

      // If create BlogItem is succeed
      if ($data["value"]) {
        $this->index();
        return;
      }
    }

    $this->render('components/blog/create', $data);
  }

  /**
   * [public] delete
   *  - URL : /delete
   *  - Summary : Render delete form & result
   * 
   * @return void
   */
  public function delete()
  {
    // The Data for delete form screen(initial)
    $data = [];

    if (isset($_GET['id'])) {
      // The Data for delete result screen
      $data = $this->deleteBlogId($_GET['id']);

      // If delete BlogItem is succeed
      if ($data["value"]) {
        $this->index();
        return;
      }
    }

    $this->render('components/blog/search', $data);
  }

  /**
   * [private] searchBlogAll
   *  - Summary : Search all BlogItem from BlogModel
   * 
   * @return array
   */
  private function searchBlogAll(): array
  {
    return $this->blog->getItems();
  }


  /**
   * [private] searchBlogId
   *  - Summary : Search BlogItem by Id from BlogModel
   * 
   * @param integer|String $id
   * @return array
   */
  private function searchBlogId(
    int|String $id
  ): array {
    $result = [
      "key" => "validation",
      "value" => false
    ];

    if (is_numeric($id)) {
      $item = $this->blog->getItem($id);

      // Is blog item exists?
      $result = $item
        ? $item
        : [
          "key" => "result",
          "value" => false
        ];
    }

    // getId is not numeric
    return $result;
  }

  private function createBlog(array $inputData): array
  {
    $createResult = $this->blog->storeItem($inputData);

    return [
      "key" => "result",
      "value" => $createResult
    ];
  }


  /**
   * [private] deleteBlogId
   *  - Summary : Delete BlogItem by Id from BlogModel
   * 
   * @param integer|String $id
   * @return array
   */
  private function deleteBlogId(
    int|String $id
  ): array {
    $result = [
      "key" => "validation",
      "value" => false
    ];

    if (is_numeric($id)) {
      $deleteResult = $this->blog->destroyItem($id);

      return [
        "key" => "result",
        "value" => $deleteResult
      ];
    }

    // getId is not numeric
    return $result;
  }
}