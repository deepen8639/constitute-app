<?php
//ローカル環境用のconfigファイル

ini_set('display_errors', 1);
// $db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
// $db['dbname'] = ltrim($db['path'], '/');
// $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
// $user = $db['user'];
// $password = $db['pass'];
define('DB_DATABASE','Constitute');
define('DB_USERNAME','User');
define('DB_PASSWORD','Massan24H');
define('PDO_DSN','mysql:dbname=Constitute;host=localhost;charset=utf8mb4');

session_start();

 ?>
