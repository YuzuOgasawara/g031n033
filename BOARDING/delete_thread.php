<?php

$db_user = 'root';     // ユーザー名
$db_pass = 'gPByapMm7='; // パスワード
$db_name = 'bbs';     // データベース名

// MySQLに接続
$mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name);


if (!empty($_POST["password"])) {
  $password = $mysqli->query("select `password` from `threads` where `threads`.`id` = {$_POST['del']}");

  foreach ($password as $key => $value) {
    $password = $value['password'];
  }

  if($_POST["password"] == $password){

    $mysqli->query("delete from `threads` where `id` = {$_POST['del']}");
    $result_message = 'メッセージを削除しました;)';
    echo $result_message;

    header('Location: http://153.126.193.128/BOARDING/thread.php');

  }else {
    $result_message = 'パスワードが違います;';
    echo $result_message;
  }
}

?>
<?php

//$id = $_POST['upd'];
$del = $_POST['del'];
$result = $mysqli->query("select * from `threads` where id = {$del}");
?>

<html>
<head>
  <title> 削除画面　</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style_entry.css">
</head>

<h1>スレッド削除画面</h1>

<body>
<p1>以下のタイトルを削除しますか？</p1>
  <?php foreach ($result as $row){ ?>
  <p><span class="demo5"><?php print(htmlspecialchars($row['name'])); ?></span></p>
  <?php } ?>

  <form action="delete_thread.php" method="post">
    <p>パスワード照合</p>
    <input type="password" class="type02" name="password" />
    <input type="hidden" name="del" value="<?php echo $_POST['del']; ?>" />
    <button class="button2" type="submit">削除</button>
  </form>


  <p><Center><a href="thread.php">戻る</a></Center></p>


  </html>
