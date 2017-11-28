<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Log in</title>

    <style media="screen">
      #login{
        width: 30%;
        margin: 40px auto;
        background: #00092D;
        padding: 20px;
      }
      input{

        margin: 10px auto;
        display:block;
      }

    </style>

  </head>
  <body>
<?php require "header.php" ?>
    <div id="login">

          <form class="" action="<?= URL  ?>/login/login" method="post">

            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit">

          </form>

    </div>

  </body>
</html>
