<?php

class DB{
  private $host = 'localhost';
  private $dbname = 'survey';
  private $user = 'root';
  private $password = '';

  public $pdo;

  public function __construct()
  {
    try {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $this->pdo = new PDO($dsn, $this->user, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $error) {
      return "Failed: " . $error->getMessage();
    }
  }
  
}

?>
