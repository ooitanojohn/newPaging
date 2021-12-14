<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>仮登録が完了しました</h1>
    <p><?php echo $_SESSION['name'] ?>様</p>
    <p>ご利用頂きありがとうございます。</p>
    <p>本登録を完了する為に、以下のURLをクリックしてください</p>
    <a href='<?php echo BASE_URL . "28\main_entry.php?entryComplete=" . $_SESSION['hashLoginId'] ?>'><?php echo BASE_URL . "28\main_entry.php?entryComplete=" . $_SESSION['hashLoginId'] ?></a>

</body>

</html>