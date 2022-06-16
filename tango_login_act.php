<?php
//忘れずに！！！！！！！！！！！！！！！
session_start();
include("functions.php");

// var_dump($_POST);
// exit();

// データ受け取り
$username = $_POST['username'];
$password = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行

// username，password，is_deletedの3項目全てを満たすデータを抽出する．
$sql = 'SELECT * FROM users_table WHERE username=:username AND password=:password AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// ユーザ有無で条件分岐
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$val) {
  //ユーザー情報がない場合
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=tango_login.php>ログイン</a>";
  exit();
} else {
  //ユーザー情報があった場合
  $_SESSION = array();                          //まずはSESSIONの中身を空っぽにする
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $val['is_admin'];
  $_SESSION['username'] = $val['username'];
  header("Location:tango_menu.php");
  exit();
}
