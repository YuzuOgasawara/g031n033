

<html>
<head>

  <meta charset="utf-8">
  <title>アンケートフォーム</title>

</head>

<body>

<h3>好きな教員は？</h3>

<form  action = 'hw3_3_4.php' method='post'>
<meta charset="utf-8">
<input name="sensei[]" type="checkbox" value="佐々木淳先生">佐々木淳先生
<input name="sensei[]" type="checkbox" value="高木正則先生">高木正則先生
<input name="sensei[]" type="checkbox" value="山田敬三先生">山田敬三先生
<input type="submit" value="送信" >

<?php

foreach ($_POST['gengo'] as $value) {
echo '<input type="hidden" name="gengo[]" value="' . $value . '">';
}

foreach ($_POST['bunya'] as $value) {
echo '<input type="hidden" name="bunya[]" value="' . $value . '">';
}
 ?>

</form>

</body>

</html>
