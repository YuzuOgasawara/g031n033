

<html>
<head>

  <meta charset="utf-8">
  <title>アンケートフォーム</title>

</head>

<body>

<h3>興味のある研究分野を選択してください。</h3>

<form  action = 'hw3_3_3.php' method='post'>
<meta charset="utf-8">
<input name="bunya[]" type="checkbox" value="教育">教育
<input name="bunya[]" type="checkbox" value="観光">観光
<input name="bunya[]" type="checkbox" value="農業">農業
<input name="bunya[]" type="checkbox" value="LS">LS
<input name="bunya[]" type="checkbox" value="地域">地域
<input type="submit" value="送信" >

<?php

foreach ($_POST['gengo'] as $value) {

echo '<input type="hidden" name="gengo[]" value="' . $value . '">';

}

 ?>

</form>
