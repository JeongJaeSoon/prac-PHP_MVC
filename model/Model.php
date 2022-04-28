<?php

namespace model;

use controller\Controller;
use PDO;
use PDOException;

require_once "env.php";

class Model
{

  private static $DB_CONNECTION = null;

  public function __construct()
  {
    $db = $this->create_db_connection(
      _ENV_DB_INFO['host'],
      _ENV_DB_INFO['port'],
      _ENV_DB_INFO['name'],
      _ENV_DB_ACCOUNT['id'],
      _ENV_DB_ACCOUNT['pw']
    );

    if (!$db) {
      Controller::render(_ERR_503);
      return;
    }

    $this->set_db_connection($db);
  }


  private function create_db_connection(
    String $db_host,
    int $db_port,
    String $db_name,
    String $db_id,
    String $db_pw
  ): ?PDO {
    $dsn = "mysql:
      host={$db_host};
      port={$db_port};
      dbname={$db_name};
    ";

    try {
      $db = new PDO($dsn, $db_id, $db_pw);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "SUCCESS!!<br/>";
      return $db;
    } catch (PDOException $e) {
      // echo $e->getMessage();
      return null;
    }
  }

  protected static function get_db_connection(): PDO
  {
    return self::$DB_CONNECTION;
  }

  private static function set_db_connection(
    PDO $db
  ) {
    self::$DB_CONNECTION = $db;
  }
}