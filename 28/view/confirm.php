<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p><?php echo $_SESSION['name'] ?></p>
    <p><?php echo $_SESSION['loginId'] ?></p>
    <p><?php echo $_SESSION['password'] ?></p>
    <p><?php echo $_SESSION['mail'] ?></p>
    <form method="post">
        <button type="submit" name="entry">仮登録する</button>
    </form>
    <form method="post">
        <button type="submit" name="back">入力画面に戻る</button>
    </form>
</body>

</html>