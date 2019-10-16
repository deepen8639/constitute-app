<?php

namespace LawApp;

/**
 * MyPageのみで使う、ユーザー情報表示のためのデータ整形クラス
 */
class UserOrder{

  public function setPartTotal($user){
    $user->Total = 0;
    $user->colTotal = 0;
    $parts = ['part1_9', 'part9_10', 'part10_41', 'part41_65', 'part65_76',
    'part76_83', 'part83_92', 'part92_96', 'part96_97', 'part97_100','part100_104'];
    foreach ($parts as $k => $part) {
      $user->$part = [];
      $index = $this->_getIndex($part);
      //$user->$part['PartTotal']を作る
      $c_total = 0;
      $w_total = 0;
      for ($i=$index[0]; $i < $index[1]; $i++) {
        //part1_9の場合、$index[0] = 1, $index[1] = 9
        $c = "c_{$i}";
        $w = "w_{$i}";
        $user->$part["p_{$i}"] = [$c => $user->$c, $w => $user->$w];
        $user->$c = intval($user->$c);
        $user->$w = intval($user->$w);
        //intに変換
        $c_total += $user->$c;
        $w_total += $user->$w;
      }//for
      $user->$part['PartTotal'] = $c_total + $w_total;
      $user->$part['PartColTotal'] = $c_total;
      $user->Total += $c_total + $w_total;
      $user->colTotal += $c_total;
    }//foreach

    return $user;
  }


  private function _getIndex($part){
    //part1_9 を、 [1, 9]にして返す
    $part = explode('part', $part);
    $part = explode('_', $part[1]);
    $index = [intval($part[0]), intval($part[1])];

    return $index;
  }


 public function getCorrectAnswerRate($part, $user, $CandT){
    //渡されたuserから、渡されたpartの正答率等の情報を返す
     $index = $this->_getIndex($part);
     $CandT = array_slice($CandT, $index[0], $index[1]-$index[0]);//渡されたpart分のCaptionとTitle
     $res = [];
     $thisPartAnswerSet = $user->$part;
     foreach ($CandT as $k => $cat) {
       $id = $cat['id'];
       $p = "p_{$id}";
       $Answers = $thisPartAnswerSet[$p];//$Answers = ['c_1' => int(),'w_1' => int()]
       if($Answers["c_{$id}"] + $Answers["w_{$id}"] !== 0){
         $CorrectAnswerRate = round($Answers["c_{$id}"]/($Answers["c_{$id}"] + $Answers["w_{$id}"]) * 100);
       }else {
         //totalがゼロなら'---'を入れる（ゼロで割ることを防ぐ）
         $CorrectAnswerRate = '---';
       }//if-else
       $res['provision'][$p] = ['caption' => $cat['caption'], 'title' => $cat['title'],
       'id' => $id, 'CorrectAnswerRate' => $CorrectAnswerRate,
       'CorrectAnswer' => $Answers["c_{$id}"], 'TotalAnswer' => $Answers["c_{$id}"] + $Answers["w_{$id}"]];
     }//foreach
     $res['PartTotal'] = $user->$part['PartTotal'];
     $res['PartColTotal'] = $user->$part['PartColTotal'];
     if( $user->$part['PartTotal'] === 0){
       $res['CorrectAnswerRate'] = '---';
     }else{
       $res['CorrectAnswerRate'] = round($user->$part['PartColTotal']
       /$user->$part['PartTotal'] * 100);
     }
     return $res;
  }//getCorrectAnswerRate







}





 ?>
