<?php
//ローカル環境用のconfigファイル

ini_set('display_errors', 1);
//データベースの設定
define('DB_DATABASE','Constitute');
define('DB_USERNAME','User');
define('DB_PASSWORD','Massan24H');
define('PDO_DSN','mysql:host=localhost;dbname=Constitute;charset=utf8');

//urlの設定
if (empty($_SERVER["HTTPS"])) {
  $url =  "http://";
} else {
  $url =  "https://";
}

define('SITE_URL', $url . $_SERVER['HTTP_HOST']);

session_start();

 ?>
