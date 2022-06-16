<?php

function connect_to_db()
{
  $dbn = 'mysql:dbname=gsacy_d02_01;charset=utf8mb4;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';
  try {
    return new PDO($dbn, $user, $pwd);                      //returnに変える
  } catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
  }
}

// ログイン状態のチェック関数
function check_session_id()
{
  if (!isset($_SESSION["session_id"]) || $_SESSION["session_id"] != session_id()) { //session_idがない場合もしくは異なる場合
    //ログインしていない場合
    header('Location:tango_login.php');
    exit();
  } else {
    //ログインしている場合
    session_regenerate_id(true);
    $_SESSION["session_id"] = session_id();
  }
}
