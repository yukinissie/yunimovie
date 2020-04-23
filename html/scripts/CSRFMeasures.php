<?php

class CSRF
{
  private static $csrf_token;
  
  public function createToken() {
    session_start();
    $token_byte = openssl_random_pseudo_bytes(16);
    $_SESSION['csrf_token'] = self::$csrf_token = bin2hex($token_byte);
  }
  public function getToken() {
    return self::$csrf_token;
  }
  public function checkToken($csrf_token) {
    session_start();
    if (isset($csrf_token) && $csrf_token === $_SESSION['csrf_token']) {
      echo "正常なリクエストです。\n";
      return true;
    }
    echo "クライアントトークン：" . $csrf_token . "\n";
    echo "サーバトークン：" . $_SESSION['csrf_token'] . "\n";
    echo "不正なリクエストです。\n";
    return false;
    
  }
}