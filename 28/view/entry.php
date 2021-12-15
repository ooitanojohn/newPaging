<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後期評価課題</title>
    <link rel="stylesheet" type="text/css" href="css/import.css">
    <!-- jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
</head>

<body>
    <?php require_once 'base/header.php';
    require_once 'base/modalNavEtc.php'
    ?>
    <main class="c-padding-bottom_100">
        <article class="u-complete-form-size">
            <div>
                <h2 class="u-font-config-h2">会員登録</h2>
            </div>
            <form method="post">
                <div class="c-input-type-text-entry">
                    <label for="name-L">氏名<span><?php echo $err['name']['empty'] ?></span></label>
                    <input type="text" name="name" id="name-L" value="<?php echo $post['name'] ?>">
                </div>
                <div class="c-input-type-text-entry">
                    <label for="loginId-L">ログインID<span><?php echo $err['loginId']['empty'] ?></span></label>
                    <input type="text" name="loginId" id="loginId-L" value="<?php echo $post['loginId'] ?>">
                </div>
                <div class="c-input-type-text-entry">
                    <label for="password-L">パスワード<span><?php echo $err['password']['empty'] . $msg['reWrite'] ?></span></label>
                    <input type="password" name="password" id="password-L">
                </div>
                <div class="c-input-type-text-entry">
                    <label for="mail-L">メールアドレス<span><?php echo $err['mail']['empty'] . $err['mail']['validate'] ?></span></label>
                    <input type="mail" name="mail" id="mail-L" value="<?php echo $post['mail']; ?>">
                </div>
                <div class="c-flex c-justify-content-center c-padding-top_50">
                    <button type="submit" name="submit" class="c-entry-button">登録</button>
                </div>
            </form>
        </article>
    </main>
    <?php require_once 'base/footer.php' ?>
    <script src="js/modal.js"></script>
</body>

</html>