<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/Provision.php');

$Prov = new LawApp\Provision();
$result = $Prov->getScore();
$wrongQues = $Prov->getWrongQues();
// var_dump($wrongQues);

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

     <title>結果</title>
     <link rel="stylesheet" href="result_styles.css">
   </head>
   <body>
     <div id="line1"><span class="title">条文練習</span></div>
     <div class="result">
       あなたの得点は
       <?php echo h($result['amount']); ?>問中
       <?php echo h($result['score']); ?>問正解で、正答率は
       <?php echo h($result['percentage']); ?>％
       でした。
     </div>
     <div class="wrong">
       <span class="w-head"><?php if(!empty($wrongQues)): ?>
         <?php echo h('<==間違えた条文==>'); ?></span>
         <?php echo '<span class="w-head2"> (クリックして全文を表示)</span>'; ?>
       <?php endif; ?>
     <div class="wrongQues">
       <?php foreach ($wrongQues as $key => $value): ?>
         <?php echo sprintf('<span class="wrongProv" id="w%d">', $key); ?>
       <?php echo h($value['title'] . $value['caption']) . '</span><br>'; ?>
       <?php echo sprintf('<div class="provision w%d hide"> %s </div>', $key, $value['provision']) ?>
     <?php endforeach; ?>
     </div>
   </div>
   <div class="backHome">
     ホームに戻る
   </div>
   <script
   src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <script src="result_jquery.js">
   </script>

   </body>
 </html>
