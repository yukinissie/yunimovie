<?php require_once('scripts/data.php'); ?>
<!doctype html>
<html lang="ja">
  <head>
    <?php $head_tpl->render('head.tpl'); ?>
  </head>
  <body>
    <?php $header_tpl->render('header.tpl'); ?>
    <?php $main_tpl->render('main.tpl'); ?>
    <?php $post_tpl->render('post.tpl'); ?>
    <?php $debug_tpl->render('debug.tpl'); ?>
    <?php $bootstrap_javascript_tpl->render('bootstrapJavaScript.tpl'); ?>
    <?php $project_javascript_tpl->render('projectJavaScript.tpl'); ?>
  </body>
</html>