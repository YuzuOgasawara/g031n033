


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>アンケートの結果</title>
</head>
<body>

<h3>アンケートの結果</h3>

<ul>
<?php

echo "＜好きな言語＞";

foreach ($_POST['gengo'] as $value) {
echo '<li>' . $value . '</li>';
}


echo "＜興味ある研究分野＞";

foreach ($_POST['bunya'] as $value) {
echo '<li>' . $value . '</li>';
}


echo "＜好きな先生＞";

foreach ($_POST['sensei'] as $value) {
echo '<li>' . $value . '</li>';
}

 ?>
</ul>


</body>
</html>
