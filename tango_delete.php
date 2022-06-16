<?php
session_start();
include("functions.php");
check_session_id();

// データ受け取り
$id = $_GET["id"];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'DELETE FROM tango_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:tango_read.php");
exit();
