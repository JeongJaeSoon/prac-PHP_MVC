<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./view/components/blog/css/item.css">
</head>

<body>
  <div class="item">
    <ul class="article">
      <li class="title">
        <span><?= $blogItem['title'] ?></span>
        <span>[<?= $blogItem['id'] ?>]</span>
      </li>
      <li class="overview">
        <span><?= $blogItem['overview'] ?></span>
      </li>
      <li class="contents">
        <span><?= $blogItem['contents'] ?></span>
      </li>
    </ul>
  </div>
</body>

</html>