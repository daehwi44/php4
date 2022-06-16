<?php
session_start();
include("functions.php");
check_session_id();

if (
  !isset($_POST['tango']) || $_POST['tango'] == '' ||
  !isset($_POST['nihongo']) || $_POST['nihongo'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit('きちんと入力されていません');
}

// データの受け取り
$tango = $_POST["tango"];
$nihongo = $_POST["nihongo"];

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'INSERT INTO tango_table (id, tango, nihongo, created_at, updated_at) VALUES (NULL, :tango, :nihongo, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':tango', $tango, PDO::PARAM_STR);
$stmt->bindValue(':nihongo', $nihongo, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

//データ入力画面へ移行
header("Location:tango_input.php");
exit();
