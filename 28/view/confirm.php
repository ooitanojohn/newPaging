<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後期評価課題</title>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/import.css">
    <!-- jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
</head>

<body>
    <?php require_once 'base/header.php';
    require_once 'base/modalNavEtc.php' ?>
    <main class="c-padding-bottom_50">
        <article class="u-complete-form-size c-padding-bottom_100">
            <div>
                <h2 class="u-font-config-h2">会員登録</h2>
            </div>
            <div>
                <p class="c-padding-bottom_10">氏名:<span><?php echo $_SESSION['name'] ?></span></p>
                <p class="c-padding-bottom_10">ログインID:<span><?php echo $_SESSION['loginId'] ?></span></p>
                <p class="c-padding-bottom_10">パスワード:<span><?php echo $password ?></span></p>
                <p class="c-padding-bottom_10">メールアドレス:<span><?php echo $_SESSION['mail'] ?></span></p>
            </div>
            <div class="c-flex c-flex-gap_10 c-justify-content-center">
                <form method="post">
                    <button type="submit" name="entry" class="c-entry-button">登録する</button>
                </form>
                <form method="post">
                    <button type="submit" name="back" class="c-entry-button">戻る</button>
                </form>
            </div>
    </main>
    <?php require_once 'base/footer.php' ?>
    <script src="js/modal.js"></script>
</body>

</html>