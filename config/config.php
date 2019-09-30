<?php
//本番環境用のconfigファイル

ini_set('display_errors', 1);
$db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
$db['dbname'] = ltrim($db['path'], '/');
$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
$user = $db['user'];
$password = $db['pass'];
define('DB_DATABASE','heroku_7ed077737e560cd');
define('DB_USERNAME',$user);
define('DB_PASSWORD',$password);
define('PDO_DSN',$dsn);

session_start();

 ?>
