<?php
require_once(__DIR__ . "/scripts/templateEngine.php");

$tpl = new TemplateEngine();
$tpl->name  = '悟空軒';
$tpl->foods = array('ラーメン', '餃子', '焼き飯', '麻婆豆腐');
$tpl->show('sample.tpl');
?>