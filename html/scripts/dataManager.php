<?php
require_once('movie.php');
require_once('databaseManager.php');

class DataManager
{
  public function hsc($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
  public function checkAjaxRequestIntegrity() {
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {  
      return true;
    }
    return false;
  }
  public function upLoadResult($result, $type) {
    if ($result === false) {
      return 'UPLOAD '.$type.'FAILE<br>\n';
    }
    return 'UPLOAD OK<br>\n';
  }
}

