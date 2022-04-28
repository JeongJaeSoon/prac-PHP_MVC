<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Search</title>
  <link rel="stylesheet" href="./view/components/blog/css/search.css">
</head>

<body>
  <?php
  require_once "view/contents/top_index.php";
  $isErr = array_key_exists('key', $data) && array_key_exists('value', $data);

  $url = _GET_REQUEST_URI()[1];
  $displayText = [
    "/search" => "検索",
    "/delete" => "削除"
  ];
  // _CHECK_DATA($data);
  ?>
  <form action="<?= $url ?>" method="GET">
    <?php if (count($data) === 0 || $isErr) { ?>
    <label for="blogId">
      <?= "{$displayText["{$url}"]}ID：" ?>
      <input type="text" name="id" id="blogId" required>
      <input type="submit" value="送信">
    </label>
    <?php } else {
      $blogItem = $data;
      require "view/components/blog/item.php";
    }
    ?>

    <?php

    // print err message
    if ($isErr) {
      $errMsgFlag = $data;
      if ($errMsgFlag['key'] === "validation" && !$errMsgFlag['value']) {
    ?>
    <p class="err-msg">数字だけ入力してください。</p>
    <?php } ?>

    <?php
      if ($errMsgFlag['key'] === "result" && !$errMsgFlag['value']) {
      ?>
    <p class="err-msg">検索結果がありません。</p>
    <?php }
    } ?>
  </form>
</body>

</html>