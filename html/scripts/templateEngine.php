<?php
class TemplateEngine
{
  public function render($tpl_file) {
    $T = $this;
    include(__DIR__ . "/../template/{$tpl_file}");
  }
}

// 参考： https://qiita.com/yasumodev/items/5e1b2ca5dbc4921a52f3