<?php

require_once(__DIR__ . '/../Class/User.php');

$user = new LawApp\User();

$res = $user->login($_POST['id'], $_POST['password']);
//ログイン出来たらtrue,できなかったらfalse

//ログイン出来ていたら、User情報のうちidのみを$_SESSION['user']
//にstdClassとして格納
header("Content-Type: application/json; charset=utf-8");
echo json_encode([
  'result' => $res]);
exit();



 ?>
