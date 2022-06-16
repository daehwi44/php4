<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>単語学習ログイン画面</title>
</head>

<body>
  <div class="main">
    <form class="form" action="tango_login_act.php" method="POST">
      <fieldset>
        <legend class="title">単語学習ログイン画面</legend>
        <div>
          username: <input class="un" type="text" name="username">
        </div>
        <div>
          password: <input class="pass" type="text" name="password">
        </div>
        <div>
          <button class="login">Login</button>
        </div>
        <a class="register" href="tango_register.php">or register</a>
      </fieldset>
    </form>
  </div>
</body>

</html>