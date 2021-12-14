<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <p><?php echo $err['not'] ?></p>
        <label for="name-L">ログインID</label>
        <input type="text" id="name-L" name="name" value="">
        <label for="password-L">パスワード</label>
        <input type="password" id="password-L" name="password">
        <button type="submit" name="submit">ログイン</button>
    </form>
</body>

</html>