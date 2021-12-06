<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .none {
            display: none;
        }
    </style>
</head>

<body>
    <nav>
        <div>
            <p><img></p>
            <p>ログイン名</p>
        </div>
        <form method="post">
            <button type="submit" name="logout">ログアウト</button>
        </form>
    </nav>
    <main>
        <article>
            <h2>&nbsp;</h2>
            <table>
                <summary>NEWS</summary>
                <tr>
                    <th>日時</th>
                    <th>タイトル</th>
                    <th>コンテンツ</th>
                </tr>
                <?php foreach ($newsDatas as $news) { ?>
                    <tr>
                        <td><?php echo $news['created_at'] ?></td>
                        <td><?php echo $news['title'] ?></td>
                        <td><?php echo $news['content'] ?></td>
                    </tr>
                <?php } ?>
            </table>
            <div class="pageNav">
                <!-- 前に戻る -->
                <a href="index.php?page=<?php echo $_GET['page'] - 1 ?>" class="<?php echo $_GET['page'] - 1 >= 0 ? '' : 'none' ?>">BACK</a>
                <!-- 0ページ目  6ページ以上から表示-->
                <a href="index.php?page=0" class="<?php echo $_GET['page'] - 5 <= 0 ? 'none' : '' ?>">0</a>
                <!-- ... 現ページ6ページ以上から表示 -->
                <span class="<?php echo $_GET['page'] - 5 <= 0 ? 'none' : '' ?>">...</span>
                <!-- 現在のページ後10ページを表示-->
                <?php for ($i = $_GET['page'] - 5; $i < $_GET['page'] + 5; $i++) { ?>
                    <a href="index.php?page=<?php echo $i ?>" class="<?php echo $i == $_GET['page'] || $i < 0 || $i > $pageLinks ? 'none' : '' ?>"><?php echo $i ?></a>
                <?php } ?>
                <!-- ... 現ページ max-5 ページ以下から表示-->
                <span class="<?php echo $_GET['page'] + 5 >= $pageLinks ? 'none' : '' ?>">...</span>
                <!-- 最後のページ 現ページ max-5 ページ以下から表示-->
                <a href="index.php?page=<?php echo $pageLinks ?>" class="<?php echo $_GET['page'] + 5 >= $pageLinks ? 'none' : '' ?>"><?php echo $pageLinks ?></a>
                <!-- 次に進む -->
                <a href="index.php?page=<?php echo $_GET['page'] + 1 ?>" class="<?php echo $_GET['page'] + 1 <= $pageLinks ? '' : 'none' ?>">NEXT</a>
            </div>
        </article>
    </main>
</body>

</html>