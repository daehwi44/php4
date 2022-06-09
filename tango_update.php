<?php
include('functions.php');

if (
  !isset($_POST['tango']) || $_POST['tango'] == '' ||
  !isset($_POST['nihongo']) || $_POST['nihongo'] == '' ||
  !isset($_POST['id']) || $_POST['id'] == ''
) {
  exit('paramError');
}

// データの受け取り
$tango = $_POST["tango"];
$nihongo = $_POST["nihongo"];
$id = $_POST['id'];

// DB接続
$pdo = connect_to_db();

// WHEREを指定しないと全削除してしまう
$sql = 'UPDATE tango_table SET tango=:tango, nihongo=:nihongo, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':tango', $tango, PDO::PARAM_STR);
$stmt->bindValue(':nihongo', $nihongo, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:tango_read.php");
exit();
