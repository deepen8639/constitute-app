<?php

namespace LawApp;

/**
 *Userが継承して使う用のクラス
 *Userの中に書きたくない処理を書く
 */
class UserFunction{

    protected function createUpdateSQL($w_id, $c_id, $id, $user){
      //User情報をupdateするためのsqlを発行する
      $sql = [];
      for ($i=0; $i < count($w_id); $i++) {
        $wpos = "w_{$w_id[$i]}";
        $wval = $user->$wpos;
        $sql[] = sprintf("update Users set %s=%d where id='{$id}';",
        $wpos, $wval);
      }//for

      for ($i=0; $i < count($c_id); $i++) {
        $cpos = "c_{$c_id[$i]}";
        $cval = $user->$cpos;
        $sql[] = sprintf("update Users set %s=%d where id='{$id}'",
        $cpos, $cval);
      }//for
      return $sql;

    }//createUpdateSQL
}








 ?>
