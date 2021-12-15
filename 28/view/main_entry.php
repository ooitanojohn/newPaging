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
    <main class="c-padding-bottom_50">
        <article class="u-complete-form-size c-padding-bottom_100">
            <div>
                <h2 class="u-font-config-h2">会員登録</h2>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="c-padding-bottom_30">
                    <p>氏名<span><?php echo $sql['name'] ?></span></p>
                </div>
                <div class="c-input-type-text-entry">
                    <label for="password-L">パスワード<span><?php echo $err['not'] ?></span></label>
                    <input type="password" id="password-L" name="password">
                </div>
                <div class="c-input-type-file-entry">
                    <label for="img-L">画像<span><?php echo $err['imgExt'] ?></span></label>
                    <input type="file" id="img-L" name="file">
                </div>
                <div class="c-flex c-justify-content-center c-padding-top_50">
                    <button type="submit" name="submit" class="c-entry-button">確認</button>
                </div>
            </form>
        </article>
    </main>
    <?php require_once 'base/footer.php' ?>
    <script src="js/modal.js"></script>
</body>

</html>