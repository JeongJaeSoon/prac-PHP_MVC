<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog List</title>
  <link rel="stylesheet" href="./view/components/blog/css/list.css">
</head>

<body>
  <?php
  require_once "view/contents/top_index.php";
  $blogItems = $data
  ?>

  <?php if (count($blogItems) === 0) { ?>
  <h1 class='no-data'> No Data</h1>

  <?php
  } else {
    foreach ($blogItems as $blogItem) {
      require "view/components/blog/item.php";
    }
  } ?>
</body>

</html>