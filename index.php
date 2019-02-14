<?php
require"libs/db.php";
$data = $_POST;
if( isset($data['input']) )
{
  $errors = array();
  $user = R::findOne('users','login = ?', array($data['login']));
  if($user)
  {
    if(password_verify($data['password'],$user->password))
    {
        $_SESSION['logged_user'] = $user;
    }else
    {
      $errors[] = 'Неверный пароль!';
    }
  }
  else {
    $errors[] = 'пользователь с таким логином не найден!';
  }
  if(! empty($errors)){
  echo '<div style="color:red;font-size:40px;">'.array_shift($errors).'</div><hr>';
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      MER4
    </title>

    <link href="css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
      <header id="header" >
      <span>
          <a href="index.php">
            <div class="logo">
              <p>CHESTER'S</p>
            </div>
          </a>

      </span>
    <div class="menu-grad" id="menu-grad">
      <div class="menu">
        <div class="paragraph">
          <a  class="go_to" href="#Tshorts"><p>ФУТБОЛКИ</p></a>
        </div>
        <div class="paragraph">
          <a  class="go_to" href="#hoodie"><p>ХУДИ</p></a>
        </div>
        <div class="paragraph">
          <a class="go_to" href="#jeans"><p>ДЖИНСЫ</p></a>
        </div>
        <div class="paragraph">
          <a class="go_to" href="#shoes"><p>ОБУВЬ</p></a>
        </div>
        <div class="paragraph">
          <a class="go_to" href="#accessories"><p>АКСЕССУАРЫ</p></a>
        </div>

      </div>
    </div>
    </header>
    <content>
        <div class = "midle grid">
            <div class="block" id="Tshorts">
              <div class="name" ><span>Футболки</span></div>
              <div class="preview grid">
                <?php
                  $c = R::count('tshorts');
                  for($i=1;$i<=$c;$i++)
                    {
                        $picture=R::load('tshorts',$i);
                        echo '<div class="item" style="background-image:url(images/'.$picture->name.')"><span><p>'.$picture->price.' Руб.</p><p>'.$picture->itemname.'</p></span></div>';

                    }
                 ?>
              </div>

            </div>
            <div class="block" id="hoodie">
              <div class="name" ><span>Худи</span></div>
              <div class="preview grid">
                <?php
                  $c = R::count('hoodie');
                  for($i=1;$i<=$c;$i++)
                    {
                        $picture=R::load('hoodie',$i);
                        echo '<div class="item" style="background-image:url(images/'.$picture->name.')"><span><p>'.$picture->price.' Руб.</p><p>'.$picture->itemname.'</p></span></div>';

                    }
                 ?>
              </div>

            </div>
            <div class="block" id="jeans">
              <div class="name"><span>Джинсы</span></div>
              <div class="preview grid">
                <?php
                  $c = R::count('jeans');
                  for($i=1;$i<=$c;$i++)
                    {   $picture=R::load('jeans',$i);
                        echo '<div class="item" style="background-image:url(images/'.$picture->name.')"><span><p>'.$picture->price.' Руб.</p><p>'.$picture->itemname.'</p></span></div>';

                    }
                 ?>
              </div>
            </div>
            <div class="block"  id="shoes">
              <div class="name"><span>Обувь</span></div>
              <div class="preview grid">
                <?php
                  $c = R::count('shoes');
                  for($i=1;$i<=$c;$i++)
                    {   $picture=R::load('shoes',$i);
                        echo '<div class="item" style="background-image:url(images/'.$picture->name.')"><span><p>'.$picture->price.' Руб.</p><p>'.$picture->itemname.'</p></span></div>';

                    }
                 ?>
              </div>

            </div>
            <div class="block" id="accessories">
                <div class="name" ><span>Аксессуары</span></div>
              <div class="preview grid">
                <?php
                  $c = R::count('accessories');
                  for($i=1;$i<=$c;$i++)
                    {   $picture=R::load('accessories',$i);
                        echo '<div class="item" style="background-image:url(images/'.$picture->name.')"><span><p>'.$picture->price.' Руб.</p><p>'.$picture->itemname.'</p></span></div>';

                    }
                 ?>
              </div>

            </div>
          </div>
    </content>
    <footer class="grid">
      <div class="contacts grid">
        <a href="https://vk.com/null_citizen">
          <div class="media" style="background-image: url(images/vkW.png)">

          </div>
        </a>
        <a href="https://www.instagram.com/thehappiestgoose/">
          <div class="media" style="background-image: url(images/instagramW.png)">

      </div>
      </a>
      </div>
      <a href="https://vk.com/id124128861">
      <div class="models">
        ПИСЬКА
      </div>
      </a>
        <a href="contacts.html">
      <div class="adress  grid">
        <p>Адрес</p>
        <div class="adress-img" style="background-image: url(images/adress.png)">

        </div>
      </div>
      </a>
    </footer>
    </div>
  <div class="interface" id="interface">

    <div class="shadow" id="shadow">
    </div>
    <div class="menuMobile" id="menuMobile">
      <div class="paragraphMobile">
          <a class="go_to" href="#Tshorts"><p>ФУТБОЛКИ</p></a>
      </div>
      <div class="paragraphMobile">
        <a class="go_to" href="#hoodie"><p>ХУДИ</p></a>
      </div>
      <div class="paragraphMobile">
        <a class="go_to" href="#jeans"><p>ДЖИНСЫ</p></a>
      </div>
      <div class="paragraphMobile">
        <a class="go_to" href="#shoes"><p>ОБУВЬ</p></a>
      </div>
      <div class="paragraphMobile">
        <a class="go_to" href="#accessories"><p>АКСЕССУАРЫ</p></a>
      </div>
      <div class="paragraphMobile">
        <a href="contacts.html"><p>АДРЕС</p></a>
      </div>
    </div>
    <div  class="menu-button fixed" id="menu-button">
      <img src="images/menu.png" alt="">
    </div>
    <div class="logInForm" id="logInForm">
      <form class="" action="index.php" method="POST">
        <p><strong>Логин</strong></p>
        <input type="text" size="20" style="font-size:35px;" name="login">
        <p><strong>Пароль</strong></p>
        <input style="font-size:35px;" type="password" size="20" name="password">
          <p><button style="width:200px;height:75px;font-size:40px;" type="submit" name="input" value="">Войти</button></p>

      </form>
        <p><a href="registration.php"><button style="width:300px;height:75px;font-size:40px;" value="">Регистрация</button></a></p>
    </div>
    <?php
    if ($_SESSION['logged_user']->id == 4)
    echo '
    <a href="admin.php">
    <div class="adminBtn" id="adminBtn">
      Добавить товары
    </div>
    </a>
    ';
    ?>
    <?php if(isset($_SESSION['logged_user'])) : ?>
      <a href="libs/exit.php">
      <div class="profile fixed">
      <p><?php echo $_SESSION['logged_user']->login;?></p>
      </div>
      </a>

  <?php else : ?>

    <div class="logIn fixed" id="logIn">
      <img src="images/logIn.svg" alt="" id="img_login" >
    </div>

    <?php endif;
?>

  </div>
  <script src="\js\main.js"></script>
  </body>
</html>
