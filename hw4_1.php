<?php
$db_user = 'root';     // ユーザー名
$db_pass = 'gPByapMm7='; // パスワード
$db_name = 'bbs';     // データベース名

// MySQLに接続
$mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name);

$result_message = ':D';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['name']) && !empty($_POST['message'])) {
    $mysqli->query("insert into `messages` (`name`,`body`) values ('{$_POST['name']}', '{$_POST['message']}')");
    $result_message = 'データベースに登録しました！XD';
  } else {
    $result_message = 'メッセージを入力してください...XO';
  }
}

$result = $mysqli->query('SELECT * from `messages`');

$sql = "SELECT * FROM messeges ORDER BY timestamp DESC";


?>

<html>
  <head>
    <title> 掲示板(仮)　</title>

    <meta charset="UTF-8">

  </head>

<h1>簡易掲示板</h1>

  <table class="table3" border=1>

  <thead>
     <tr><th>名前</th><th>コメント</th><th>時間</th></tr>
</thead>

<?php foreach ($result as $row){ ?>
  <tbody>

  <tr>
      <td><?php print($row['name']); ?></td>
      <td><?php print($row['body']); ?></td>
      <td><?php print($row['timestamp']); ?></td>
     </tr>
   </tbody>
   <?php } ?>
  </table>
  <?php
    echo $result_message;
   ?>
    <form action="hw4_1.php" method="post">
      <p>名前入力</p>
      <input type="text" name="name" />

      <p>コメント入力</p>
      <input type="text" name="message" />
      <input type="submit" />
    </form>
  </body>
</html>
