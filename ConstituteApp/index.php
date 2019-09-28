<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/Provision.php');

$Prov = new LawApp\Provision();
$Prov->resetSession();
$Prov->setParts();
$CandT = $_SESSION['CapAndTitle'];

// var_dump($CandT);

 ?>


 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>憲法学習教室</title>
     <link rel="stylesheet" href="index_styles.css">
   </head>
  <body>
    <div id='line1'>
      <span class="title">条文練習</span>
    </div>

    <div class="container">

            <span class="part0" id="part0_1">前文</span>
            <div class="part" id="part1_9"><label><input type="checkbox" name="checkbox[]" value="part1_9" class="hide checkBox" />第一章　天皇（第一条～第八条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,1,8); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part9_10">   <label><input type="checkbox" name="checkbox[]" value="part9_10" class="hide checkBox">第二章　戦争の放棄（第九条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,9,1); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part10_41">  <label><input type="checkbox" name="checkbox[]" value="part10_41" class="hide checkBox">第三章　国民の権利及び義務（第十条～第四十条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,10,31); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part41_65">  <label><input type="checkbox" name="checkbox[]" value="part41_65" class="hide checkBox">第四章　国会（第四十一条～第六十四条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,41,24); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part65_76">  <label><input type="checkbox" name="checkbox[]" value="part65_76" class="hide checkBox">第五章　内閣（第六十五条～第七十五条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,65,11); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part76_83">  <label><input type="checkbox" name="checkbox[]" value="part76_83" class="hide checkBox">第六章　司法（第七十六条～第八十二条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,76,7); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part83_92">  <label><input type="checkbox" name="checkbox[]" value="part83_92" class="hide checkBox">第七章　財政（第八十三条～第九十一条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,83,9); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part92_96">  <label><input type="checkbox" name="checkbox[]" value="part92_96" class="hide checkBox">第八章　地方自治（第九十二条～第九十五条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,92,4); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part96_97">  <label><input type="checkbox" name="checkbox[]" value="part96_97" class="hide checkBox">第九章　改正（第九十六条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,96,1); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part97_100"> <label><input type="checkbox" name="checkbox[]" value="part97_100" class="hide checkBox">第十章　最高法規（第九十七条～第九十九条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,97,3); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>
            <div class="part" id="part100_104"><label><input type="checkbox" name="checkbox[]" value="part100_104" class="hide checkBox">第十一章　補則（第百条～第百三条）</label></div>
            <div class="CapAndTitle indivHide">
              <?php $Arr = array_slice($CandT,100,4); ?>
              <?php foreach ($Arr as $key => $value): ?>
                <?php echo sprintf('<input type="checkbox" name="checkbox[]"
                value="%s" id="%s"><label for="%s">', $value['id'],$value['id'],$value['id']); ?>
                <?php echo h( '　'.$value['title'] . $value['caption']) . '</label><br>'; ?>
              <?php endforeach; ?>
            </div>

    </div>
    <div class="custom">
      <span class="customButton">
        複数選択する
      </span>
      <span class="customStartButton hide">
        開始
      </span>
    </div>

    <div class="individual">
      <span class="individualButton">
        条文で選択する
      </span>
      <span class="indivStartButton hide">
        開始
      </span>
    </div>



  <script
  src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="index_jquery.js">

  </script>

   </body>

 </html>
