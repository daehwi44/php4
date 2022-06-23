<?php
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['user_id'];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
//LEFT OUTER JOINでtango_tableとresult_tableをtangoリストのIDで結合させる
$sql = 'SELECT * FROM tango_table LEFT OUTER JOIN (SELECT tango_id, COUNT(id) AS know_count FROM know_table GROUP BY tango_id) AS result_table ON tango_table.id = result_table.tango_id ORDER BY tango ASC';

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute(); //$status には実行結果が入るが，この時点ではまだデータ自体の取得はできていない点に注意
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetchAll() 関数でデータ自体を取得する
$output = "";                         //空の箱を作って
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["tango"]}</td>
      <td>{$record["nihongo"]}</td>
      <td><a href='know_create.php?user_id={$user_id}&tango_id={$record["id"]}'>しってる！</a></td>
      <td><span>しってる！の数:{$record["know_count"]}</span></td>
      <td>
      <a href='tango_edit.php?id={$record["id"]}'>edit</a>
      </td>
      <td>
      <a href='tango_delete.php?id={$record["id"]}'>delete</a>
      </td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録済単語一覧（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>登録済単語一覧（一覧画面）</legend>
    <a href="tango_menu.php">メニューに戻る</a>
    <table>
      <thead>
        <tr>
          <th>単語</th>
          <th>日本語</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>tango</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>