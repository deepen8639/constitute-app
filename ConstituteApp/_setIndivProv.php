<?php

require_once(__DIR__ . '/Provision.php');

$Prov = new LawApp\Provision();
$res = 'ok';

if($_POST['selected_id']==='none'){
  $res = 'not selected';
}else{
  $Prov->setIndivProv($_POST['selected_id']);
}
header("Content-Type: application/json; charset=utf-8");
echo json_encode([
  'res' => $res]);

 ?>
