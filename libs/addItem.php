<?php
    require "db.php";
  //Upload picture
  if(empty($_FILES['picture'])){}
  else
  {
    $errors = array();
    $file_name = $_FILES['picture']['name'];
    $file_size = $_FILES['picture']['size'];
    $file_tmp  = $_FILES['picture']['tmp_name'];
    $file_type = $_FILES['picture']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['picture']['name'])));

    $expensions = array("jpeg", "jpg", "png");

    if($file_size > 33333333)
    {
      $errors[] = 'file > 30 Mb';
    }
    if (empty($errors))
    {
      $OK = true;
    }
    else
    {
      //Вывод первой ошибки из массива
      $OK = false;
      echo '<div style="color: red">'.array_shift($errors).'</div><hr>';
    }
  }

  $Add_data = $_POST;
  $upload = "../images/".$_FILES['picture']['name'];

  //save picture
  if(isset($Add_data['AddItem'])) //проверка нажатия кнопки
  {
    $errors = array();


    if (empty($errors))
    {
      // массив ошибок пуст
      // перезапись
      if($_FILES['picture']['name'] != '' && $OK == true)
      {
        move_uploaded_file($_FILES["picture"]["tmp_name"],$upload);
        switch ($Add_data['category']) {

          case 't_shorts':
          $item = R::dispense('tshorts');
          $item->category = $Add_data['category'];
          $item->name = $_FILES['picture']['name'];
          $item->price = $Add_data['price'];
          $item->itemname = $Add_data['item_name'];
          R::store($item);
            break;

            case 'jeans':
            $item = R::dispense('jeans');
            $item->category = $Add_data['category'];
            $item->name = $_FILES['picture']['name'];
            $item->price = $Add_data['price'];
            $item->itemname = $Add_data['item_name'];
            R::store($item);
              break;

              case 'shoes':
              $item = R::dispense('shoes');
              $item->category = $Add_data['category'];
              $item->name = $_FILES['picture']['name'];
              $item->price = $Add_data['price'];
              $item->itemname = $Add_data['item_name'];
              R::store($item);
                break;

                case 'hoodie':
                $item = R::dispense('hoodie');
                $item->category = $Add_data['category'];
                $item->name = $_FILES['picture']['name'];
                $item->price = $Add_data['price'];
                $item->itemname = $Add_data['item_name'];
                R::store($item);
                  break;

                  case 'accessories':
                  $item = R::dispense('accessories');
                  $item->category = $Add_data['category'];
                  $item->name = $_FILES['picture']['name'];
                  $item->price = $Add_data['price'];
                  $item->itemname = $Add_data['item_name'];
                  R::store($item);
                    break;

          default:
            // code...
            break;
        }
      }



      $Add_data = null;
      header('Location:../index.php');
    }
    else
    {
      //Вывод первой ошибки из массива
      echo '<div style="color: red">'.array_shift($errors).'</div><hr>';
    }
  }
?>
