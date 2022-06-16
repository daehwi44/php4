<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>単語学習アプリ</title>
</head>

<body>
  <form action="tango_create.php" method="POST">
    <fieldset>
      <legend>単語登録画面（入力画面）</legend>
      <a href="tango_menu.php">メニューに戻る</a>
      <div>
        単語: <input type="text" name="tango">
      </div>
      <div>
        日本語: <input type="text" name="nihongo">
      </div>
      <div>
        <button>登録</button>
      </div>
    </fieldset>
  </form>

</body>

</html>