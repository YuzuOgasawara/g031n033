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

    header("Location: http://153.126.193.128/BOARDING/entry.php?id={$_POST['thread_id']}");

  }else {
    $result_message = 'パスワードが違います;';
    echo $result_message;
  }
}
//コメントを確認
?>
<?php

//$id = $_POST['upd'];
$upd = $_POST['upd'];
$result = $mysqli->query("select * from `messages` where id = {$upd}");
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
  <title> 編集画面　</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style_entry.css">
</head>

<h1>編集画面</h1>

<!--新しいコメントと前画面で入力したパスワードを入力-->
<body>

<p1>前に登録したコメント</p1>
  <?php foreach ($result as $row){ ?>
  <p><span class="demo6"><?php print(htmlspecialchars($row['body'])); ?></span></p>
  <?php } ?>

  <form action="update.php?id=<?php echo $_GET['id']; ?>" method="post">
    <p1>コメント入力</p1>
    <br>
    <input type="text" class="type02" name="message" />
    <br>
    <br>
    <br>
    <p1>パスワード照合</p1>
    <br>
    <input type="password" class="type02" name="password" />
    <input type="hidden" name="upd" value="<?php echo $_POST['upd']; ?>" />
    <input type="hidden" name="thread_id" value="<?php echo $_GET['id']; ?>" />
    <button class="button1" type="submit">編集</button>
  </form>

  <p><a href="entry.php?id=<?php echo $_GET['id']; ?>">戻る</a></p>

  </html>
