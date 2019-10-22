<?php

require_once(__DIR__ . '/config/config.php');
require_once(__DIR__ . '/functions/functions.php');
require_once(__DIR__ . '/Class/Provision.php');
require_once(__DIR__ . '/Class/User.php');
require_once(__DIR__ . '/Class/UserOrder.php');

//もしもloginされていなかったら、loginPageにリダイレクトする
if(!$_SESSION['login']){
  header("Location: " . SITE_URL . '/-loginPage.php');
}


$Prov = new LawApp\Provision();
$User = new LawApp\User();
$UserOrder = new LawApp\UserOrder();

//stdClassのuserを$user変数に格納
//この時点では$_SESSION['user']にはidしかないのを、
//全ての情報を取得する
$User->setUserInfo($_SESSION['user']->id);
$user = $_SESSION['user'];

// foreach ($user as $k => $v) {
//   if(substr($k, 0, 1) === 'c'){
//     $user->$k = random_int(0,8);
//   }
//   if(substr($k, 0, 1) === 'w'){
//     $user->$k = random_int(0,8);
//   }
// }
//$PartUser->part1_9['PartTotal']を作る
$user = $UserOrder->setPartTotal($user);

$total = $user->Total;
$colTotal = $user->colTotal;
// var_dump($user);

$CandT = $Prov->getParts();
 ?>



 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
   <head>
     <!-- Global site tag (gtag.js) - Google Analytics -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149161268-1"></script>
 <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-149161268-1');
 </script>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>マイページ</title>
     <link rel="stylesheet" href="./css/MyPage.css">

   </head>
   <body>
     <div id="line1"><span class="title">条文練習</span></div>
     <div class="container">
       <p class="mypage">マイページ</p>
       <p class="ID">ID: <?php echo $user->id; ?></p>
       <p>これまでに解いた条文数  <?php echo $total; ?></p>
       <p>正解した条文数  <?php echo $colTotal; ?></p>
       <?php if ($total === 0): ?>
         <?php echo sprintf("<p>正解率  %s</p>", '---'); ?>
         <?php else: ?>
         <?php echo sprintf("<p>正解率  %d  ％</p>", round($colTotal/$total *100)); ?>
       <?php endif; ?>

       <div class="part" id="part1_9">
         第一章　天皇（第一条～第八条）
         <?php $res = $UserOrder->getCorrectAnswerRate('part1_9', $user, $CandT); ?>
         <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
       <span class="open">条文ごとに見る</span>
       </div>
       <div class="CapAndTitle indivHide">
         <?php foreach ($res['provision'] as $p => $r): ?>
           <?php echo'<span class="provision">'; ?>
           <?php echo $r['title'] . $r['caption']; ?>
           <?php echo $r['CorrectAnswerRate']; ?>
           <?php echo "％<br></span>"; ?>
         <?php endforeach; ?>
       </div>
       <div class="part" id="part9_10">
          第二章　戦争の放棄（第九条）
          <?php $res = $UserOrder->getCorrectAnswerRate('part9_10', $user, $CandT); ?>
          <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
          <span class="open">条文ごとに見る</span>
        </div>
        <div class="CapAndTitle indivHide">
          <?php foreach ($res['provision'] as $p => $r): ?>
            <?php echo'<span class="provision">'; ?>
            <?php echo $r['title'] . $r['caption']; ?>
            <?php echo $r['CorrectAnswerRate']; ?>
            <?php echo "％<br></span>"; ?>
          <?php endforeach; ?>
        </div>
       <div class="part" id="part10_41">
         第三章　国民の権利及び義務（第十条～第四十条）
         <?php $res = $UserOrder->getCorrectAnswerRate('part10_41', $user, $CandT); ?>
         <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
         <span class="open">条文ごとに見る</span>
       </div>
       <div class="CapAndTitle indivHide">
         <?php foreach ($res['provision'] as $p => $r): ?>
           <?php echo'<span class="provision">'; ?>
           <?php echo $r['title'] . $r['caption']; ?>
           <?php echo $r['CorrectAnswerRate']; ?>
           <?php echo "％<br></span>"; ?>
         <?php endforeach; ?>
       </div>
       <div class="part" id="part41_65">
         第四章　国会（第四十一条～第六十四条）
         <?php $res = $UserOrder->getCorrectAnswerRate('part41_65', $user, $CandT); ?>
         <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
         <span class="open">条文ごとに見る</span>
       </div>
       <div class="CapAndTitle indivHide">
         <?php foreach ($res['provision'] as $p => $r): ?>
           <?php echo'<span class="provision">'; ?>
           <?php echo $r['title'] . $r['caption']; ?>
           <?php echo $r['CorrectAnswerRate']; ?>
           <?php echo "％<br></span>"; ?>
         <?php endforeach; ?>
       </div>
       <div class="part" id="part65_76">
          第五章　内閣（第六十五条～第七十五条）
          <?php $res = $UserOrder->getCorrectAnswerRate('part65_76', $user, $CandT); ?>
          <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
          <span class="open">条文ごとに見る</span>
        </div>
        <div class="CapAndTitle indivHide">
          <?php foreach ($res['provision'] as $p => $r): ?>
            <?php echo'<span class="provision">'; ?>
            <?php echo $r['title'] . $r['caption']; ?>
            <?php echo $r['CorrectAnswerRate']; ?>
            <?php echo "％<br></span>"; ?>
          <?php endforeach; ?>
        </div>
       <div class="part" id="part76_83">
         第六章　司法（第七十六条～第八十二条）
         <?php $res = $UserOrder->getCorrectAnswerRate('part76_83', $user, $CandT); ?>
         <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
         <span class="open">条文ごとに見る</span>
       </div>
       <div class="CapAndTitle indivHide">
         <?php foreach ($res['provision'] as $p => $r): ?>
           <?php echo'<span class="provision">'; ?>
           <?php echo $r['title'] . $r['caption']; ?>
           <?php echo $r['CorrectAnswerRate']; ?>
           <?php echo "％<br></span>"; ?>
         <?php endforeach; ?>
       </div>
       <div class="part" id="part83_92">
          第七章　財政（第八十三条～第九十一条）
          <?php $res = $UserOrder->getCorrectAnswerRate('part83_92', $user, $CandT); ?>
          <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
          <span class="open">条文ごとに見る</span>
        </div>
        <div class="CapAndTitle indivHide">
          <?php foreach ($res['provision'] as $p => $r): ?>
            <?php echo'<span class="provision">'; ?>
            <?php echo $r['title'] . $r['caption']; ?>
            <?php echo $r['CorrectAnswerRate']; ?>
            <?php echo "％<br></span>"; ?>
          <?php endforeach; ?>
        </div>
       <div class="part" id="part92_96">
         第八章　地方自治（第九十二条～第九十五条）
         <?php $res = $UserOrder->getCorrectAnswerRate('part92_96', $user, $CandT); ?>
         <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
         <span class="open">条文ごとに見る</span>
       </div>
       <div class="CapAndTitle indivHide">
         <?php foreach ($res['provision'] as $p => $r): ?>
           <?php echo'<span class="provision">'; ?>
           <?php echo $r['title'] . $r['caption']; ?>
           <?php echo $r['CorrectAnswerRate']; ?>
           <?php echo "％<br></span>"; ?>
         <?php endforeach; ?>
       </div>
       <div class="part" id="part96_97">
          第九章　改正（第九十六条）
          <?php $res = $UserOrder->getCorrectAnswerRate('part96_97', $user, $CandT); ?>
          <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
          <span class="open">条文ごとに見る</span>
        </div>
        <div class="CapAndTitle indivHide">
          <?php foreach ($res['provision'] as $p => $r): ?>
            <?php echo'<span class="provision">'; ?>
            <?php echo $r['title'] . $r['caption']; ?>
            <?php echo $r['CorrectAnswerRate']; ?>
            <?php echo "％<br></span>"; ?>
          <?php endforeach; ?>
        </div>
       <div class="part" id="part97_100">
         第十章　最高法規（第九十七条～第九十九条）
         <?php $res = $UserOrder->getCorrectAnswerRate('part97_100', $user, $CandT); ?>
         <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
         <span class="open">条文ごとに見る</span>
       </div>
       <div class="CapAndTitle indivHide">
         <?php foreach ($res['provision'] as $p => $r): ?>
           <?php echo'<span class="provision">'; ?>
           <?php echo $r['title'] . $r['caption']; ?>
           <?php echo $r['CorrectAnswerRate']; ?>
           <?php echo "％<br></span>"; ?>
         <?php endforeach; ?>
       </div>
       <div class="part" id="part100_104">
         第十一章　補則（第百条～第百三条）
         <?php $res = $UserOrder->getCorrectAnswerRate('part100_104', $user, $CandT); ?>
         <?php echo sprintf("正答率 %s  ％", $res['CorrectAnswerRate']); ?>
         <span class="open">条文ごとに見る</span>
       </div>
       <div class="CapAndTitle indivHide">
         <?php foreach ($res['provision'] as $p => $r): ?>
           <?php echo'<span class="provision">'; ?>
           <?php echo $r['title'] . $r['caption']; ?>
           <?php echo $r['CorrectAnswerRate']; ?>
           <?php echo "％<br></span>"; ?>
         <?php endforeach; ?>
       </div>

     </div>

     <script
     src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     <script src="./script/MyPage_jquery.js"></script>
   </body>
 </html>
