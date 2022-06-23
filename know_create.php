<?php

include('functions.php');

$user_id = $_GET['user_id'];
$tango_id = $_GET['tango_id'];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM know_table WHERE user_id=:user_id AND tango_id=:tango_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':tango_id', $tango_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$know_count = $stmt->fetchColumn();
// まずはデータ確認
//var_dump($know_count);
//exit();

if ($know_count != 0) {
  // いいねされている状態
  $sql = 'DELETE FROM know_table WHERE user_id=:user_id AND tango_id=:tango_id';
} else {
  // いいねされていない状態
  $sql = 'INSERT INTO know_table (id, user_id, tango_id, created_at) VALUES (NULL, :user_id, :tango_id, sysdate())';
}

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':tango_id', $tango_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:tango_read.php");
exit();
