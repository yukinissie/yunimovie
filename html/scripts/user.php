<?php

class User
{
  private $name;
  private $id;

  public function __construct($name, $id) {
    $this->name = $name;
    $this->id = $id;
  }
  public function getName() {
    return $this->name;
  }
  public function getId() {
    return $this->id;
  }
}

session_start();
if ($_SESSION["userName"]) {
  $user = new User($_SESSION["userName"], $_SESSION["ID"]);
} else {
  $user = new User('ゲスト', -1);
}