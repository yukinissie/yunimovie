<?php
echo 'name：'.$_FILES['upmovie']['name']."<br/>\n";
echo 'type：'.$_FILES['upmovie']['type']."<br/>\n";
echo 'tnp_name：'.$_FILES['upmovie']['tmp_name']."<br/>\n";
echo 'error_number：'.$_FILES['upmovie']['error']."<br/>\n";
echo 'size：'.$_FILES['upmovie']['size']."<br/>\n";
echo var_dump($_FILES);
// ファイルアップロードエラー
// PHP公式サイトより
// https://www.php.net/manual/ja/features.file-upload.errors.php
echo 'エラー詳細：';
switch($_FILES['upmovie']['error']) {
  case UPLOAD_ERR_OK: echo 'エラーはなく、ファイルアップロードは成功しています。'; break;
  case UPLOAD_ERR_INI_SIZE: echo 'アップロードされたファイルは、php.iniの upload_max_filesize ディレクティブの値を超えています。'; break;
  case UPLOAD_ERR_FORM_SIZE: echo 'アップロードされたファイルは、HTML フォームで指定された MAX_FILE_SIZE を超えています。'; break;
  case UPLOAD_ERR_PARTIAL: echo 'アップロードされたファイルは一部のみしかアップロードされていません。'; break;
  case UPLOAD_ERR_NO_FILE: echo 'ファイルはアップロードされませんでした。'; break;
  case UPLOAD_ERR_NO_TMP_DIR: echo 'テンポラリフォルダがありません。'; break;
  case UPLOAD_ERR_CANT_WRITE: echo 'ディスクへの書き込みに失敗しました。'; break;
  case UPLOAD_ERR_EXTENSION: echo 'PHP の拡張モジュールがファイルのアップロードを中止しました。 どの拡張モジュールがファイルアップロードを中止させたのかを突き止めることはできません。 読み込まれている拡張モジュールの一覧を phpinfo() で取得すれば参考になるでしょう。'; break;
}
echo '<br>';

$movie_name = $_FILES['upmovie']['name'];

//動画を保存
$result = move_uploaded_file($_FILES['upmovie']['tmp_name'], './upload/' . $movie_name);
if ( $result === true ) {
  echo "UPLOAD OK";
} else {
  echo "UPLOAD NG";
}
echo '<style>
video {
  width:345px;
  height:205px;
}
</style>';
echo '<video playsinline preload="none"  controls>';
echo '<source src="video.php?movie_name=' . $movie_name . '">';
echo '</video>';