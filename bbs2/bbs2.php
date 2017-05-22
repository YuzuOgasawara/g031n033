<?php

$db_user = 'root';     // ユーザー名
$db_pass = 'gPByapMm7='; // パスワード
$db_name = 'bbs';     // データベース名

// MySQLに接続
$mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name);

//メッセージとパスワードに値がはいっているとき
if (!empty($_POST["message"]) && !empty($_POST["password"])) {
  $password = $mysqli->query("select `password` from `messages` where `messages`.`id` = {$_POST['upd']}");

  foreach ($password as $key => $value) {
    $password = $value['password'];
  }

  if($_POST["password"] == $password){
    $mysqli->query("update `messages` set `body` = '{$_POST['message']}' where `messages`.`id` = {$_POST['upd']}");
    $result_message = '編集しました:)';
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

<!--新しいコメントと前画面で入力したパスワードを入力-->
<body>
  <form action="bbs2.php" method="post">
    <p>コメント入力</p><input type="text" name="message" />
    <p>パスワード入力</p><input type="password" name="password" />
    <input type="hidden" name="upd" value="<?php echo $_POST['upd']; ?>" />
    <input type="submit" value="変更" />
  </form>
  </html>
