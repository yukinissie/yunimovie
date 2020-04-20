<?php
require_once(__DIR__ . '/CSRFMeasures.php');
require_once(__DIR__ . '/dataManager.php');
require_once(__DIR__ . '/templateEngine.php');
require_once(__DIR__ . '/movieManager.php');
require_once(__DIR__ . '/user.php');


// CSRF対策
CSRF::createToken();

// template genelate
$head_tpl = new TemplateEngine();
$header_tpl = new TemplateEngine();
$main_tpl = new TemplateEngine();
$post_tpl = new TemplateEngine();
$debug_tpl = new TemplateEngine();
$script_tpl = new TemplateEngine();

// TODO 
if ($_SESSION["NAME"]) {
  $session_status = 'login';
} else {
  $session_status = 'logout';
}

$header_tpl->session_status = $session_status;
$main_tpl->session_status = $session_status;
$post_tpl->session_status = $session_status;

$header_tpl->location = 'index.php';
if (MovieManager::loadData() !== null){
  $main_tpl->movies = MovieManager::getReversedList();
}
$main_tpl->user = $user;

