<?php

require_once(__DIR__ . '/Provision.php');


$Prov = new LawApp\Provision();
$Prov->setProv($_POST['selected_id']);
$_SESSION['currentID'] = $_POST['selected_id'];
$_SESSION['currentPart'] = $_POST['currentPart'];
// header("Content-Type: application/json; charset=utf-8");
// echo json_encode([
//   'result' => $_SESSION['currentPart']]);


 ?>
