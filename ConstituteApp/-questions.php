<?php

require_once(__DIR__ . '/config/config.php');
require_once(__DIR__ . '/functions/functions.php');
require_once(__DIR__ . '/Class/Provision.php');


$Prov = new LawApp\Provision();



if($_SESSION['current_num'] >= 0){

  $questions = $Prov->getQuestion();
  $provision = $questions['provision'];
  $caption =  $questions['caption'];
  $title = $questions['title'];
  $blank = $questions['blank_1'];
  $choices = $questions['choices_1'];
  $choices = explode(',' , $choices);
  shuffle($choices);
  $provision = str_replace($blank, '(   )', $provision);

}else{
  $confirmText = $Prov->getConfirmText();
}


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

    <title></title>
    <link rel="stylesheet" href="../css/questions_styles.css">
  </head>
  <body>
    <div id="line1"><span class="title">条文練習</span></div>



    <?php if($_SESSION['current_num'] < 0): ?>
    <?php echo '<div class="confirm">' . h($confirmText) . '</div>'; ?>
    <?php echo '<div class="startbutton line">' . h('はい') . '</div>'; ?>
    <?php echo '<label for="random" class="random">ランダム</label><input type="checkbox" name="random" value="random" id="random">' ; ?>
    <?php else: ?>
      <div class="caption">
        <?php echo '<pre>' . h($caption) . '</pre>'; ?>
      </div>
    <div class="provision">
      <?php echo '<pre>'. h($title) . '</pre><pre>' . h($provision) . '</pre>'; ?>
    </div>
    <ol class="answers">
    <?php for($i=0; $i<3; $i++) : ?>
      <?php echo '<li class="ans"><label><input type="radio" name="choices"
       value="">' . h($choices[$i]) . '</label></li>'; ?>
    <?php endfor; ?>
  </ol>
  <?php echo '<div id="button" class="disabled line">' . h('回答') . '</div>'; ?>
    <?php endif; ?>

    <div class="dialog" id="dialog_id">
     <div class="dialog-header">
      <span class="dialog-title"></span>
      <button type="button" class="dialog-close"
        <?php if(!$Prov->isLast()): ?>
          <?php echo ' value="close">'. h('閉じる'); ?>
        <?php else: ?>
          <?php echo ' value="result">'.  h('結果を見る'); ?>
        <?php endif; ?>
       </button>
     </div>
   <div class="dialog-content">正解OR不正解</div>
     </div>

    <div class="backHome line">ホームに戻る</div>
    <script
    src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../script/questions_jquery.js">

    </script>
  </body>
</html>