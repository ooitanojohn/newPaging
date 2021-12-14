<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <label for="name-L">氏名<?php echo $err['name']['empty'] ?></label>
        <input type="text" name="name" id="name-L" value="<?php echo $post['name'] ?>">

        <label for="loginId-L">ログインID<?php echo $err['loginId']['empty'] ?></label>
        <input type="text" name="loginId" id="loginId-L" value="<?php echo $post['loginId'] ?>">

        <label for="password-L">パスワード<?php echo $err['password']['empty'] . $msg['reWrite'] ?></label>
        <input type="password" name="password" id="password-L">

        <label for="mail-L">メールアドレス<?php echo $err['mail']['empty'] . $err['mail']['validate'] ?></label>
        <input type="mail" name="mail" id="mail-L" value="<?php echo $post['mail']; ?>">
        <button type="submit" name="submit">確認</button>
    </form>
</body>

</html>