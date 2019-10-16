<?php

require_once(__DIR__ . '/../Class/User.php');

$user = new LawApp\User();
$res = $user->createNewUser($_POST['id'], $_POST['password']);
//Userの作成に成功したらtrue

header("Content-Type: application/json; charset=utf-8");
echo json_encode([
  'result' => $res]);
exit();



 ?>
