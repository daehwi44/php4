<?php

//ログアウトの文は基本書き換えることはない
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 42000, '/');
}
session_destroy();
header('Location:tango_login.php');
exit();
