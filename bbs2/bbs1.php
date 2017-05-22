<?php
$db_user = 'root';     // ユーザー名
$db_pass = 'gPByapMm7='; // パスワード
$db_name = 'bbs';     // データベース名

// MySQLに接続
$mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name);


$result_message = ':D';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!empty($_POST['name']) && !empty($_POST['message']) && !empty($_POST['password'])) {
    $name = $mysqli->real_escape_string($_POST['name']);
    $message = $mysqli->real_escape_string($_POST['message']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $mysqli->query("insert into `messages` (`name`,`body`,`password`) values ('$name', '$message', '$password')");
    $result_message = 'データベースに登録しました！XD';

    // var_dump($_POST);

  } else {
    $result_message = 'メッセージを入力してください...XO';
  }

  if (!empty($_POST['del'])) {

    $mysqli->query("delete from `messages` where `id` = {$_POST['del']}");
    $result_message = 'メッセージを削除しました;)';
  }


}

//データベースからレコード取得
$result = $mysqli->query('select * from `messages` order by `id` desc');

?>



<html>
<head>
  <title> 掲示板(仮)　</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="bbs.css">
</head>

<h1>簡易掲示板</h1>



<body>
  <form action="bbs1.php" method="post">
    <p>名前入力</p><input type="text" name="name" />
    <p>コメント入力</p><input type="text" name="message" />
    <p>パスワード入力</p><input type="password" name="password" />
    <input type="submit" />
  </form>




  <table class="type11" border=1>

  <thead>
    <tr>
      <th scope="cols">名前</th>
      <th scope="cols">コメント</th>
      <th scope="cols">時間</th>
      </tr>
    </thead>

  <?php foreach ($result as $row){ ?>

    <tbody>
      <tr>
        <td><?php print($row['name']); ?></td>
        <td><?php print($row['body']); ?></td>
        <td><?php print($row['timestamp']); ?></td>
        <td>
          <form action="bbs3.php" method="post">
            <input type="hidden" name="del" value="<?php echo $row['id']; ?>" />
            <input type="submit" value="削除" />
          </form>
        </td>
        <td>
          <form action="bbs2.php" method="post">
            <input type="hidden" name="upd" value="<?php echo $row['id']; ?>" />
            <input type="submit" value="編集" />
          </form>
        </td>
      </tr>
    </tbody>
    <?php } ?>
  </table>


</body>
</html>
