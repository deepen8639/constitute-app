<?php

namespace LawApp;

require_once(__DIR__ . '/../config/config.php');

class Provision {
  private $_db;

  public function __construct(){
      $this->_createToken();
      $this->_dbConnect();
    }

 private function _dbConnect(){
     try {
       $this->_db = new \PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
       $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
     } catch (\PDOException $e) {
       echo $e->getMessage();
       exit;
     }
  }

  private function _createToken() {
    if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    }
  }

 public function getQuestion(){
   return $_SESSION['currentProvSet'][$_SESSION['current_num']];
 }

 public function getCustomQuestion(){
 }

 public function setProv($selected_id){
   try {
     $selected_id = explode('part', $selected_id);
     $selected_id = explode('_', $selected_id[1]);
     $sql = sprintf("select provision, caption, title,blank_1,choices_1
     from Constitute where id>=%s and id<%s", $selected_id[0],$selected_id[1]);
     $stmt = $this->_db->prepare($sql);
     $stmt->execute();
     $_SESSION['currentProvSet'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

   } catch (\PDOException $e) {
      echo $e->getMessage() . " - " . $e->getLine().PHP_EOL;
      exit;
   }
 }


 public function setCustomProv($selected_id){
   $ids = array();
   for($i=0; $i<count($selected_id); $i++){
     $id = explode('part', $selected_id[$i]);
     $id = explode('_', $id[1]);
     $ids[] = $id;
   }
   $_SESSION['currentProvSet'] = array();
   try {
     for($i=0; $i<count($ids); $i++){
       $sql = sprintf("select provision, caption, title,blank_1,choices_1
       from Constitute where id>=%s and id<%s", $ids[$i][0],$ids[$i][1]);
       $stmt = $this->_db->prepare($sql);
       $stmt->execute();
       $_SESSION['currentProvSet'][] = $stmt->fetchAll(\PDO::FETCH_ASSOC);
     }
       $customQues = [];
       foreach ($_SESSION['currentProvSet'] as $key => $value) {
         for($i=0; $i<count($value); $i++){
           $customQues[] = $value[$i];
         }
       $_SESSION['currentProvSet'] = $customQues;
     }

   } catch (\PDOException $e) {
     echo $e->getMessage() . " - " . $e->getLine().PHP_EOL;
     exit;
   }

 }


 public function setIndivProv($selected_id){
   $ques = '';
   for($i=0; $i<count($selected_id); $i++){
     if($i=== count($selected_id) - 1){
       $ques .= '?';
     }else{
       $ques .= '?' . ',';
     }
   }
   try {
     $sql = sprintf("select provision, caption, title,blank_1,choices_1
     from Constitute where id in (%s)", $ques);
     $stmt = $this->_db->prepare($sql);
     $stmt->execute($selected_id);

     $_SESSION['currentProvSet'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

   } catch (\PDOException $e) {
      echo $e->getMessage() . " - " . $e->getLine().PHP_EOL;
      exit;
   }
 }

 public function getConfirmText(){
   if($_SESSION['currentID'] === 0){
     return;
   }else{
     return $_SESSION['currentPart'] . 'を練習しますか';
   }
 }

 public function getCustomConfText(){
   $text = '';
   $Parts = $_SESSION['currentPart'];
   for($i=0; $i<count($Parts); $i++){
     $text .= $Parts[$i] . '<br>';
   }
   $text = $text . 'を練習しますか';
   return $text;
 }
 public function getIndivConfText(){
   $confText = [];
   for($i=0; $i<count($_SESSION['currentProvSet']); $i++){
     $text = '';
     $text .= $_SESSION['currentProvSet'][$i]['title'].
     $_SESSION['currentProvSet'][$i]['caption'];
     $confText[] = $text;
   }
   // $Parts = $_SESSION['currentPart'];
   // for($i=0; $i<count($Parts); $i++){
   //   $text .= $Parts[$i] . '<br>';
   // }
   // $text = $text . 'を練習しますか';
   $confText[count($_SESSION['currentProvSet'])-1] .= 'を練習しますか';
   return $confText;
 }


 public function checkAnswer($answer){
    if($answer === $_SESSION['currentProvSet'][$_SESSION['current_num']]['blank_1']){
      return 'collect';
    }else{
      //正解を返す
      return $_SESSION['currentProvSet'][$_SESSION['current_num']]['blank_1'];
    }
  }

 public function pageReload(){
  $_SESSION['current_num']++;
 }

 public function resetSession(){
   $_SESSION['current_num'] = -1;
   $_SESSION['currentProvSet'] = [];
   $_SESSION['currentID'] = '';
   $_SESSION['correct_count'] = 0;
   $_SESSION['currentPart'] = '';
   $_SESSION['wrong_ques'] = [];
   $_SESSION['random'] = false;
   // $this->_initSession();
 }

 public function shuffle(){
   shuffle($_SESSION['currentProvSet']);
 }

 public function setParts(){
   if(!isset($_SESSION['CapAndTitle'])){

     try {
       $sql = sprintf("select id, caption, title from Constitute");
       $stmt = $this->_db->prepare($sql);
       $stmt->execute();
       $_SESSION['CapAndTitle'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

     } catch (\PDOException $e) {
       echo $e->getMessage() . " - " . $e->getLine().PHP_EOL;
       exit;
     }
   }

 }

 public function isFinished(){
   return count($_SESSION['currentProvSet'])
    === $_SESSION['current_num'];
 }


 public function getScore(){
   return [
     'percentage' => round($_SESSION['correct_count']
     / count($_SESSION['currentProvSet']) * 100),
     'score' => $_SESSION['correct_count'],
     'amount' => count($_SESSION['currentProvSet']),
     ];
 }

 public function getWrongQues(){
   $wrongQues = [];
   $quesNum = $_SESSION['wrong_ques'];
   for($i=0; $i<count($quesNum); $i++){
     $wrongQues[] = $_SESSION['currentProvSet'][$quesNum[$i]];
   }
   return $wrongQues;
 }

 public function isLast(){
   if($_SESSION['current_num'] === -1){
     return false;
   }else{
   return count($_SESSION['currentProvSet'])
   === $_SESSION['current_num'] + 1;
   }
 }





}

 ?>
