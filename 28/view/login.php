<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/import.css">
    <!-- jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
</head>

<body>
    <?php require_once 'base/header.php';
    require_once 'base/modalNavEtc.php' ?>
    <main class="c-padding-bottom_100">
        <article>
            <div class="u-complete-form-size">
                <div>
                    <h2 class="u-font-config-h2">ログイン</h2>
                </div>
                <div>
                    <p><?php echo $err['not'] ?></p>
                </div>
                <form method="post">
                    <div class="c-input-type-text-entry">
                        <label for="name-L">ログインID</label>
                        <input type="text" id="name-L" name="name">
                    </div>
                    <div class="c-input-type-text-entry">
                        <label for="password-L">パスワード</label>
                        <input type="password" id="password-L" name="password">
                    </div>
                    <div class="c-flex c-justify-content-center c-padding-top_50">
                        <button type="submit" name="submit" class="c-entry-button">ログイン</button>
                    </div>
                </form>
            </div>
    </main>
    <?php require_once 'base/footer.php' ?>
    <script src="js/modal.js"></script>
</body>

</html>