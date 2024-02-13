<?php
  session_start();
  require 'other/helpers.php';
  require 'other/settings.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <div class="form_cl">
      <form class="formm" method="post">
        <h1 style="top: 10px;">Вход</h1>
        <input type="text" name="login_auth" id="login" placeholder="Логин" value="<?php echo $_POST['login'] ?>"><br>
        <?php echo $err_m['auth_login'] ?>
        <input type="password" name="pass_auth" id="passa" placeholder="Пароль" ><br>
        <?php echo $err_m['pass'] ?>
        <input type="submit" name="submit_auth" id="subb" value="Готово" style="top: 35px;">

      </form>
    </div>


    <style media="screen">
     .form_cl input {
        position: relative;
        top: 15px;
        margin-top: 20px;
      }
    </style>


    <?php
    $mysql->close();
    ?>
  </body>
</html>
