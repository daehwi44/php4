<?php
session_start();
include("functions.php");
check_session_id();

// id受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM tango_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>単語学習アプリ</title>
</head>

<body>
  <form action="tango_update.php" method="POST">
    <fieldset>
      <legend>単語編集画面</legend>
      <a href="tango_read.php">一覧画面</a>
      <a href="tango_study.php">学習画面</a>
      <div>
        単語: <input type="text" name="tango" value="<?= $record['tango'] ?>">
      </div>
      <div>
        日本語: <input type="text" name="nihongo" value="<?= $record['nihongo'] ?>">
      </div>
      <div>
        <input type="hidden" name="id" value="<?= $record['id'] ?>">
      </div>
      <div>
        <button>登録</button>
      </div>
    </fieldset>
  </form>


</body>

</html>