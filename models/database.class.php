<?php

class DataBase
{
  private $host = "localhost";
  private $dbname = "chat";
  private $username = "root";
  private $pswd = "";

  public function connect()
  {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    $pdo = new PDO($dsn, $this->username, $this->pswd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
  
}

$database = new DataBase();

$connect = $database->connect();

