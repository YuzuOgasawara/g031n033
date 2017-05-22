<?php

$title = 'この授業のTAは誰でしょう？';

$question = array(); //この変数は配列ですよという宣言
$question = array('さとう','かんの','てつか','ふくさか'); //4択の選択肢を設定

$answer = $question[2];

shuffle($question);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>多肢選択式クイズ</title>
</head>
<body>

  <h2><?php echo $title ?></h2>
  <form method="POST" action="hw3_2_2.php">
     <?php foreach($question as $value){ ?>
     <input type="radio" name="question" value="<?php echo $value; ?>" /> <?php echo $value; ?><br>
     <?php } ?>
     <input type="hidden" name="answer" value="<?php echo $answer ?>">
     <input type="submit" value="送信">
  </form>
  <html>
  <head>
