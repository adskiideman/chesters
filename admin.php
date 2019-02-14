<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link href="css/main.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <body>
      <a href="index.php"><div class="back">
        <p>НАЗАД</p>
    </div>
  </a>
  <div class="AdminForm">
    <form class="grid" action="../libs/AddItem.php" method="post" enctype="multipart/form-data">
                        <h2>Категория товара</h2>
                        <p><select size="1" name="category">
                            <option value="t_shorts">Футболки</option>
                            <option value="hoodie">Худи</option>
                            <option value="jeans">Джинсы</option>
                            <option value="shoes">Обувь</option>
                            <option value="accessories">Аксессуары</option>
                          </select></p>
                        <h2>Изображение товара</h2>
                        <input class="hide" type="file" name="picture" id="upload-picture" value="">
                          <h2>Цена товара</h2>
                            <input class="hide" type="number" name="price" id="price" value="">
                            <h2>Название товара</h2>
                            <input type="text" name="item_name" value="" id="item-name" style="margin-bottom: 30px;">
                        <button class="btn-add" name="AddItem">Добавить товар</button>
                    </form>
  </div>

    </body>
</html>
