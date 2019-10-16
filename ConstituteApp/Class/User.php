<?php

namespace LawApp;

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/UserFunction.php');
/**
 * ユーザーを作成、ログイン、変更、破棄、するためのクラス
 */
class User extends UserFunction{

  private $_db;

  function __construct()
  {
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


  public function createNewUser($id, $password){
    try {
      //SQL文の発行
      $sql = "insert into Users(id, password, created, modified) values
      (:id, :password, now(), now())";
      $password = password_hash($password, PASSWORD_DEFAULT);
      //実行
      $stmt = $this->_db->prepare($sql);
      $res = $stmt->execute([":id" => $id, ":password" => $password]);
      return $res;
    } catch (\Exception $e) {
      return $e->getMessage() . " - " . $e->getLine().PHP_EOL;

    }

  }


  public function login($id, $password){
    try {
      //入力されたidから情報を持ってくる
      $sql = 'select id, password from Users where id=:id';
      $stmt = $this->_db->prepare($sql);
      $stmt->execute([":id" => $id]);
      $res = $stmt->fetch();

    } catch (\Exception $e) {
      // return $e->getMessage() . " - " . $e->getLine().PHP_EOL;
      return false;
    }
    //パスワードが正しいかどうかの判定
    if(password_verify($password, $res['password'])){
      // $_SESSION['UserInfo'] = $res;
      $_SESSION['login'] = true;
      //User情報をstdClassで保持
      $_SESSION['user'] = new \stdClass();
      $_SESSION['user']->id = $id;
      return true;
    }else {
      return false;
    }
  }

  public function setUserInfo($id){
    //User情報を返す
    try {
      //User情報のidから情報を持ってくる
      $sql = 'select * from Users where id=:id';
      $stmt = $this->_db->prepare($sql);
      $stmt->execute([":id" => $id]);
      $res = $stmt->fetch();
      foreach ($res as $key => $value) {
        $_SESSION['user']->$key = $value;
      }
    } catch (\Exception $e) {
      // return $e->getMessage() . " - " . $e->getLine().PHP_EOL;
      return false;
    }
  }

  public function updateUserInfo($w_id, $c_id, $id, $user){
    //User情報を更新する
    //それぞれのIDの正誤レコードを+1する。
    for ($i=0; $i < count($w_id); $i++) {
      $wpos = "w_{$w_id[$i]}";
      $_SESSION['user']->$wpos += 1;
    }
    for ($i=0; $i < count($c_id); $i++) {
      $cpos = "c_{$c_id[$i]}";
      $_SESSION['user']->$cpos += 1;
    }
    $sql = $this->createUpdateSQL($w_id, $c_id, $id, $_SESSION['user']);
    foreach ($sql as $key => $s) {
      try {
        // 発行したsql文を順次実行
        $stmt = $this->_db->prepare($s);
        $stmt->execute();
      } catch (\PDOException $e) {
        return false;
      }//try catch
    }//foreach

  }//updateUserInfo



}









 ?>
