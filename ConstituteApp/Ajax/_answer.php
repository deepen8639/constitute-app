<?php

require_once(__DIR__ . '/../Class/Provision.php');
$Prov = new LawApp\Provision();

$res = $Prov->checkAnswer($_POST['answer']);

if($res === 'collect'){
  $_SESSION['collect_ques_id'][] = $_SESSION['currentProvSet'][$_SESSION['current_num']]['id'];
  //条文のIDを格納する
  $_SESSION['correct_count']++;
}else{
  $_SESSION['wrong_ques_id'][] = $_SESSION['currentProvSet'][$_SESSION['current_num']]['id'];
  //間違えた条文のIDを格納する
  $_SESSION['wrong_ques'][] = $_SESSION['current_num'];

}

header("Content-Type: application/json; charset=utf-8");
echo json_encode([
  'result' => $res]);
exit();



 ?>
