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
    require_once 'base/modalNavEtc.php' ?>
    <main class="c-padding-bottom_200">
        <article class="l-container">
            <div class="c-container_50">
                <h2 class="u-font-complete-h2">登録完了</h2>
                <p>仮登録が完了しました</p>
                <p><?php echo $_SESSION['name'] ?>様</p>
                <p>ご利用頂きありがとうございます。</p>
                <p>本登録を完了する為に、以下のURLをクリックしてください</p>
                <a href='<?php echo BASE_URL . "28\main_entry.php?entryComplete=" . $_SESSION['hashLoginId'] ?>'><?php echo BASE_URL . "28\main_entry.php?entryComplete=" . $_SESSION['hashLoginId'] ?></a>
            </div>
        </article>
    </main>
    <?php require_once 'base/footer.php' ?>
    <script src="js/modal.js"></script>
</body>

</html>