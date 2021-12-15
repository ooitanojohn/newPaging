<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/import.css">
    <title>後期評価課題</title>
</head>

<body>
    <?php require_once 'base/header.php' ?>
    <main class="c-padding-bottom_50">
        <article class="u-complete-form-size c-padding-bottom_100">
            <div>
                <h2 class="u-font-config-h2">会員登録</h2>
            </div>
            <form method="post">
                <div class="c-input-type-text-entry">
                    <label for="name-L">氏名<?php echo $err['name']['empty'] ?></label>
                    <input type="text" name="name" id="name-L" value="<?php echo $post['name'] ?>">
                </div>
                <div class="c-input-type-text-entry">
                    <label for="loginId-L">ログインID<?php echo $err['loginId']['empty'] ?></label>
                    <input type="text" name="loginId" id="loginId-L" value="<?php echo $post['loginId'] ?>">
                </div>
                <div class="c-input-type-text-entry">
                    <label for="password-L">パスワード<?php echo $err['password']['empty'] . $msg['reWrite'] ?></label>
                    <input type="password" name="password" id="password-L">
                </div>
                <div class="c-input-type-text-entry">
                    <label for="mail-L">メールアドレス<?php echo $err['mail']['empty'] . $err['mail']['validate'] ?></label>
                    <input type="mail" name="mail" id="mail-L" value="<?php echo $post['mail']; ?>">
                </div>
                <div class="c-flex c-justify-content-center c-padding-top_50">
                    <button type="submit" name="submit" class="c-entry-button">登録</button>
                </div>
            </form>
        </article>
    </main>
    <?php require_once 'base/footer.php' ?>
</body>

</html>