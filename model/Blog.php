<?php

namespace model;

class Blog extends Model
{
  public function getItems(): array
  {
    $statement = $this->get_db_connection()->prepare(
      "SELECT * FROM blog"
    );
    $statement->execute();

    $result = array();

    while ($row = $statement->fetch()) {
      $result[] = $row;
    }

    return $result;
  }


  public function getItem(
    int $id
  ): array|bool {
    // TODO Need to change to bind
    $statement = $this->get_db_connection()->prepare(
      "SELECT * FROM blog WHERE id={$id}"
    );
    $statement->execute();

    $result = $statement->fetch();
    // _CHECK_DATA($result);

    return $result;
  }

  public function storeItem(
    array $inputData
  ): bool {
    $pdo = $this->get_db_connection();
    $statement = $pdo->prepare(
      "INSERT INTO blog (title, overview, contents)
      VALUE (:title, :overview, :contents)"
    );
    $statement->bindValue(":title", $inputData['title']);
    $statement->bindValue(":overview", $inputData['overview']);
    $statement->bindValue(":contents", $inputData['contents']);

    try {
      $statement->execute();
    } catch (\Throwable $th) {
      //throw $th;
      return false;
    }

    // $blogId = $pdo->lastInsertId();
    return true;
  }

  public function destroyItem(
    int $id
  ): bool {
    if (!$this->getItem($id)) {
      return false;
    }
    // TODO Need to change to bind
    $statement = $this->get_db_connection()->prepare(
      "DELETE FROM blog WHERE id=${id};"
    );
    $statement->execute();
    $statement->fetch();

    return true;
  }
}