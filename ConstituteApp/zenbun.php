<?php

require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/config.php');

$zenbun = $_SESSION['currentProvSet'][0]['provision'];
$title = $_SESSION['currentProvSet'][0]['title'];

 ?>


 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
   <head>
     <meta charset="utf-8">

     <title>憲法学習教室</title>
     <link rel="stylesheet" href="zenbun_styles.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
     <div id='line1'>
       <span class="title">条文練習</span>
     </div>
     <div class="zenbun-title">
       <pre><?php echo h($title) ?></pre>
     </div>
   <div class="zenbun">
     <pre><?php echo h($zenbun) ?></pre>
   </div>

   <div class="backHome-button">
     ホームに戻る
   </div>
   <script
   src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <script src="index_jquery.js">

   </script>
   </body>
 </html>
