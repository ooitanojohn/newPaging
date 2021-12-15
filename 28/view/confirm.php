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
            <div>
                <p>氏名:<?php echo $_SESSION['name'] ?></p>
                <p>ログインID<?php echo $_SESSION['loginId'] ?></p>
                <p>パスワード<?php echo $_SESSION['password'] ?></p>
                <p>メールアドレス<?php echo $_SESSION['mail'] ?></p>
            </div>
            <div class="c-flex c-justify-content-center c-padding-top_50">
                <form method="post">
                    <button type="submit" name="entry" class="c-entry-button">登録する</button>
                </form>
                <form method="post">
                    <button type="submit" name="back" class="c-entry-button">戻る</button>
                </form>
            </div>
    </main>
    <?php require_once 'base/footer.php' ?>
</body>

</html>