<?php
$db_user = 'root';     // ユーザー名
$db_pass = 'gPByapMm7='; // パスワード
$db_name = 'bbs';     // データベース名
// MySQLに接続
$mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name);


$result_message = ':D';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!empty($_POST['name']) && !empty($_POST['password'])) {
    $name = $mysqli->real_escape_string($_POST['name']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $mysqli->query("insert into `threads` (`name`,`password`) values ('$name', '$password')");
    $result_message = 'データベースに登録しました！XD';

    // var_dump($_POST);

  } else {
    $result_message = 'メッセージを入力してください...XO';
  }

  if (!empty($_POST['del'])) {

    $mysqli->query("delete from `threads` where `id` = {$_POST['del']}");
    $result_message = 'メッセージを削除しました;)';
  }


}

//データベースからレコード取得
$result = $mysqli->query('select * from `threads` order by `id` desc');

?>


<?php
// データベースに登録する際に対策する場合
$message = htmlspecialchars($_POST['message']);
$mysqli->query("insert into `threads` (`body`) values ('{$message}')");
?>

<!-- HTMLを出力する際に対策する場合 -->
<?php $message = htmlspecialchars($row['body']); ?>
<span><?php echo $message; ?></span>



<html>

<head>
  <title> スレッド一覧　</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style_thread.css">

</head>

<h1>スレッド投稿</h1>


<table class="type02">
  <thead>
    <tr>

      <th><p>タイトル</p></th>
      <th><p>パスワード</p></th>

    </tr>
  </thead>

  <tbody>
    <form action="thread.php" method="post">
      <tr>

        <td><input type="text" class="type02" name="name" /></td>
        <td><input type="password" class="type02" name="password" /></td>
        <td>
          <input type="hidden" name="thread_id" value="<?php echo $_GET['id']; ?>" />
          <input type="submit" class="type03" value="投稿"/>
        </td>

      </tr>
    </form>
  </tbody>

</table>

<br>


<table class="type01">

  <thead>
    <tr>
      <th scope="cols">タイトル</th>
      <th scope="cols">時間</th>
      <th></th>
    </tr>
  </thead>


  <tbody>

    <?php foreach ($result as $row){ ?>
      <tr>
        <td>
          <div align="left">
          <a href="entry.php?id=<?php echo $row['id']; ?>">
            <?php print(htmlspecialchars($row['name'])); ?>
          </a>
        </div>
        </td>
        <td><?php print(htmlspecialchars($row['timestamp'])); ?></td>


        <td>
          <Center>
            <form action="delete_thread.php" method="post">
              <input type="hidden" name="del" value="<?php echo $row['id']; ?>" />
              <button class="button2" type="submit">削除</button>
            </form>
          </Center>
        </td>

      </tr>

    </tbody>
    <?php } ?>

  </table>


</body>
</html>
