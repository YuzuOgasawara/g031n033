
<!-- hw3_1.php -->

<html>
  <head>
    <meta charset="utf-8">
    <title>一問一答クイズ</title>
  </head>

  <body>
    <h3>この授業のTAは誰でしょう？</h3>
    <form action="hw3_1.php" method="post">
      <input type="text"     name="username" />
      <input type="submit" />
    </form>
  </body>
</html>

<?php

  if (isset($_POST['username']) and $_POST['username'] === 'Tetsuka' or $_POST['username'] === '手塚' or $_POST['username'] === 'てつか'
  or $_POST['username'] === 'Hirano' or $_POST['username'] === '平野' or $_POST['username'] === 'ひらの')
   {
    echo "The right answer! :D";
  }
  else{
    echo "Sorry, wrong answer! XO";
  }

?>
