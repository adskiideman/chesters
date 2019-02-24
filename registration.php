<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php
    require "libs/db.php";

    $data = $_POST;
    if( isset($data['input']) )
    {
      $errors = array();
      if( trim($data['login']) == '')
      {
        $errors[] = 'Введите логин';
      }
      if( trim($data['email']) == '')
      {
        $errors[] = 'Введите email';
      }
      if( trim($data['password']) == '')
      {
        $errors[] = 'Введите пароль';
      }
      if( trim($data['password']) != $data['password_2'])
      {
        $errors[] = 'Пароли не совпадают';
      }
      if(R::count('users', "login = ?", array($data['login'])) > 0)
      {
        $errors[] = 'Пользователь с таким логином уже существует';
      }
      if(R::count('users', "email = ?", array($data['email'])) > 0)
      {
        $errors[] = 'Пользователь с таким Email уже существует';
      }
      if(empty($errors)){
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color:green;font-size:40px;">Вы успешно зарегистрированы!</div><hr>';

      }else{
        echo '<div style="color:#ffeee7;font-size:40px;">' .array_shift($errors).'</div><hr>';
      }

    } ?>
    <link href="css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
  <body>

    <a href="/index.php"><div class="back">
      <p>НАЗАД</p>
      </div>
</a>
<div class="formRegistration">
  <form class="" action="registration.php" method="POST">
    <p><strong>Логин</strong></p>
    <input type="text" size="15" style="font-size:40px;" name="login">
    <p><strong>Ваш Email</strong></p>
    <input type="email" size="15" style="font-size:40px;" name="email">
    <p><strong>Пароль</strong></p>
    <input style="font-size:40px;" type="password" size="15" name="password">
    <p><strong>Повторите Пароль</strong></p>
    <input style="font-size:40px;" type="password" size="15" name="password_2">
      <p><button style="width:300px;height:75px;font-size:40px;" type="submit" name="input" value="">Регистрация</button></p>

  </form>
</div>

  </body>
</html>
