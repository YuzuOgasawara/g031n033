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

    header("Location: http://153.126.193.128/BOARDING/entry.php?id={$_POST['thread_id']}");

  }else {
    $result_message = 'パスワードが違います;';
    echo $result_message;
  }
}

?>

<?php

//$id = $_POST['upd'];
$del = $_POST['del'];
$result = $mysqli->query("select * from `messages` where id = {$del}");
?>

<?php
// データベースに登録する際に対策する場合
// $message = htmlspecialchars($_POST['message']);
// $mysqli->query("insert into `messages` (`body`) values ('{$message}')");
?>

<!-- HTMLを出力する際に対策する場合 -->
<?php //$message = htmlspecialchars($row['body']); ?>
<!--<span><?php //echo $message; ?></span>-->



<html>
<head>
  <title> 削除画面　</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style_entry.css">
</head>

<h1>削除画面</h1>

<body>

<p1>以下のコメントを削除しますか？</p1>
  <?php foreach ($result as $row){ ?>
  <p><span class="demo5"><?php print(htmlspecialchars($row['body'])); ?></span></p>
  <?php } ?>

  <form action="delete.php?id=<?php echo $_GET['id']; ?>" method="post">
    <p>パスワード照合</p>
    <input type="password" class="type02" name="password" />
    <input type="hidden" name="del" value="<?php echo $_POST['del']; ?>" />
    <input type="hidden" name="thread_id" value="<?php echo $_GET['id']; ?>" />
    <button class="button2" type="submit">削除</button>
  </form>

<p><a href="entry.php?id=<?php echo $_GET['id']; ?>">戻る</a></p>

  </html>
