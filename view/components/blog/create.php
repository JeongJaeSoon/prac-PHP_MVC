<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Create</title>
  <link rel="stylesheet" href="./view/components/blog/css/create.css">
</head>

<body>
  <?php
  require_once "view/contents/top_index.php";
  ?>
  <form action="create" class="article" method="POST">
    <div class="title">
      <label for="title">
        <span> 題名： </span>
        <input name="title" type="text" id="title" placeholder="テスト" required>
      </label>
    </div>
    <div class="overview">
      <label for="overview">
        <span> 要約： </span>
        <textarea name="overview" id="overview" cols="30" rows="10" placeholder="テスト書き込み" required /></textarea>
      </label>
    </div>
    <div class="contents">
      <label for="contents">
        <span> 本文： </span>
      </label>
      <textarea name="contents" id="contents" cols="30" rows="10" placeholder="テスト書き込みです。" required></textarea>
    </div>
    <?php
    $isErr = array_key_exists('key', $data) && array_key_exists('value', $data);
    if ($isErr) {
      $errMsgFlag = $data;
      if ($errMsgFlag['key'] === "result" && !$errMsgFlag['value']) {
    ?>
    <p class="err-msg">ブログの書き込みに失敗しました。</p>
    <?php
      }
    }
    ?>
    <input type="submit" value="送信">
  </form>
</body>

</html>