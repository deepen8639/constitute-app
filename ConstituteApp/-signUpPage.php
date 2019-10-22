<?php



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
     <title>新規登録</title>
     <link rel="stylesheet" href="./css/signUpPage.css">
   </head>
   <body>
     <div id="line1"><span class="title">条文練習</span></div>

    <div class="container">
      <div class="form">
        <input type="text" name="ID" id="ID" placeholder="ID or mailaddress">
        <input type="password" name="password" id="password" placeholder="password">
        <span id="btn">新規登録</span>
      </div>
    </div>


     <script
     src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     <script src="./script/signUpPage_jquery.js"></script>
   </body>
 </html>
