<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./view/contents/menus.css">
</head>

<body>
  <div class="menus">
    <p><a href="<?= "http://{$_SERVER['HTTP_HOST']}/list"; ?>">プログ一覧</a></p>
    <p><a href="<?= "http://{$_SERVER['HTTP_HOST']}/search"; ?>">プログ検索</a></p>
    <p><a href="<?= "http://{$_SERVER['HTTP_HOST']}/create"; ?>">プログ書き込む</a></p>
    <p><a href="<?= "http://{$_SERVER['HTTP_HOST']}/delete"; ?>">プログ削除</a></p>
  </div>
</body>

</html>