<?php

require_once(__DIR__ . '/../Class/Provision.php');
$Prov = new LawApp\Provision();

$Prov->pageReload();
if($_POST['random'] == 1){
  $_SESSION['random'] = true;
  $Prov->shuffle();
  // $_SESSION['debug'] = 'ok';
}

 ?>
