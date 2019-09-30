<?php

require_once(__DIR__ . '/Provision.php');
$Prov = new LawApp\Provision();

$res = $Prov->checkAnswer($_POST['answer']);

if($res === 'collect'){
  $_SESSION['correct_count']++;
}else{
  $_SESSION['wrong_ques'][] = $_SESSION['current_num'];
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode([
  'result' => $res]);
exit();



 ?>
