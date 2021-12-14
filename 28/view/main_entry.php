<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <p>氏名<span><?php echo $sql['name'] ?></span></p>
        <label for="password-L">パスワード<?php echo $err['not'] ?></label>
        <input type="password" id="password-L" name="password">
        <label for="img-L">画像<?php echo $err['imgExt'] ?></label>
        <input type="file" id="img-L" name="file">
        <button type="submit" name="submit">確認</button>
    </form>
</body>

</html>