<?php
require_once('databaseManager.php');

class UserManager
{
  public function getUserName($id) {
    return self::loadUserData($id)['name'];
  }
  private function loadUserData($id) {
    try {
      $dbh = DatabaseManager::getHandle();
      $stmt = $dbh->prepare('SELECT * FROM userData WHERE id = ?');
      $stmt->execute(array($id));
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      return $data;
    } catch (PDOException $e) {
      return false;
    }
  }
}