<?php

class CSRF
{
  private static $csrf_token;
  
  public function createToken() {
    session_start();
    $toke_byte = openssl_random_pseudo_bytes(16);
    $_SESSION['csrf_token'] = self::$csrf_token = bin2hex($toke_byte);
  }
  public function getToken() {
    session_start();
    return self::$csrf_token;
  }
  public function checkToken($csrf_token) {
    session_start();
    if (isset($csrf_token) && $csrf_token === $_SESSION['csrf_token']) {
      echo "正常なリクエストです";
      return true;
    }
    echo 'クライアントトークン：' . $csrf_token;
    echo 'サーバトークン：' . $_SESSION['csrf_token'];
    echo "不正なリクエストです";
    return false;
    
  }
}