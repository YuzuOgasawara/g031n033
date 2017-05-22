<?php

$db_user = 'root';     // ユーザー名
$db_pass = 'gPByapMm7='; // パスワード
$db_name = 'bbs';     // データベース名

// MySQLに接続
$mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name);


if (!empty($_POST["password"])) {
  $password = $mysqli->query("select `password` from `messages` where `messages`.`id` = {$_POST['del']}");

  foreach ($password as $key => $value) {
    $password = $value['password'];
  }

  if($_POST["password"] == $password){

      $mysqli->query("delete from `messages` where `id` = {$_POST['del']}");
      $result_message = 'メッセージを削除しました;)';
    echo $result_message;

header('Location: http://153.126.193.128/bbs/bbs1.php');

  }else {
    $result_message = 'パスワードが違います;';
    echo $result_message;
  }
}

 ?>

<html>
<head>
  <title> 掲示板(仮)　</title>
  <meta charset="UTF-8">
</head>

<body>
  <form action="bbs3.php" method="post">
    <p>パスワード入力</p><input type="password" name="password" />
    <input type="hidden" name="del" value="<?php echo $_POST['del']; ?>" />
    <input type="submit" value="削除" />
  </form>
  </html>
