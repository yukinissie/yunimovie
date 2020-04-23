<?php
require_once('dataManager.php');

class ThumbnailManager
{
  private $thumbnail_name;
  private $tmp_thumbnail_name;
  private $thumbnail_type;
  private $date;
  private $user;

  public function __construct($tmp_thumbnail_name, $thumbnail_type, $date, $user) {
    $this->tmp_thumbnail_name = DataManager::hsc($tmp_thumbnail_name);
    $this->thumbnail_type = DataManager::hsc($thumbnail_type);
    $this->date = $date;
    $this->user = $user;
  }
  public function generateNameThumbnail() {
    $this->thumbnail_name = $this->date.' . '.$this->getType();
  }
  private function getType() {
    switch($this->thumbnail_type) {
      case 'image/gif' : return 'gif'; break;
      case 'image/jpeg' : return 'jpeg'; break;
      case 'image/png' : return 'png'; break;
    }
  }
  public function saveOnServerThumbnail() {
    $result = move_uploaded_file($this->tmp_thumbnail_name, '../img/'. $this->user->getId() .'/'.$this->thumbnail_name);
    echo DataManager::upLoadResult($result, 'IMAGE');
  }
  public function generateFilePathThumbnail() {
    return '../img/'. $this->user->getId() .'/'.$this->thumbnail_name;
  }
}