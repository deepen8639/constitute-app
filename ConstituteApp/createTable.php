<?php


require_once(__DIR__ . '/config/config.php');

try {
  $db = new \PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
  echo $e->getMessage();
  exit;
}

//sql文の発行
$sql = "create table if not exists Users (
  id varchar(255) unique,
  password varchar(255),
  created datetime default now(),
  modified datetime,";
  for ($i=1; $i < 104; $i++) {
    // code...
    $sql .= " c_{$i} int not null default 0,";
  }
for ($i=1; $i < 104; $i++) {
  // code...
  if ($i === 103) {
    $sql .= " w_{$i} int not null default 0);";

  }else {
    $sql .= " w_{$i} int not null default 0,";

  }
}


try {
  $stmt = $db->prepare($sql);
  $stmt->execute();
} catch (\PDOException $e) {
  echo $e->getMessage();
  exit;
}


echo $sql;
exit;

 ?>
