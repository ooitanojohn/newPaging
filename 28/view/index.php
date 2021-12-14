<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/import.css">
    <style>
        .none {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <h1>PH24後期評価課題</h1>
        <nav>
            <div>
                <p><img src="<?php echo DIR_IMG . $_SESSION['id'] . '/' . 'thumb_' . $_SESSION['file_name'] ?>" alt="サムネイル画像" width="60" height="70"></p>
            </div>
            <form method="post">
                <button type="submit" name="logout">ログアウト</button>
            </form>
        </nav>
    </header>
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
                <?php foreach ($newsLists as $news) { ?>
                    <tr>
                        <td><?php echo $news['created_at'] ?></td>
                        <td><?php echo $news['title'] ?></td>
                        <td><?php echo $news['content'] ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="pdfId" value="<?php echo $news['id'] ?>" />
                                <button type="submit" name="pdf">PDFダウンロード</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="pageNav">
                <!-- 前に戻る -->
                <a href="index.php?page=<?php echo $_GET['page'] - 1 ?>" class="<?php echo $pLBclass ?>">BACK</a>
                <!-- 0ページ目  6ページ以上から表示-->
                <a href="index.php?page=0" class="<?php echo $pLTclass ?>">0</a>
                <!-- ... 6ページ以上から表示 -->
                <span class="<?php echo $pLTclass ?>">...</span>
                <!-- 前後10ページを表示-->
                <?php for ($i = $_GET['page'] + $pageLinkNum[0]; $i <= $_GET['page'] + $pageLinkNum[1]; $i++) { ?>
                    <a href="index.php?page=<?php echo $i ?>" class="<?php echo $i == $_GET['page'] || $i < 0 || $i > $pageLinks ? 'none' : '' ?>"><?php echo $i ?></a>
                <?php } ?>
                <!-- ... max-5ページ以下から表示-->
                <span class="<?php echo $pageLinkLast ?>">...</span>
                <!-- 最後のページ max-5 ページ以下から表示-->
                <a href="index.php?page=<?php echo $pageLinks ?>" class="<?php echo $pageLinkLast ?>"><?php echo $pageLinks ?></a>
                <!-- 次に進む -->
                <a href="index.php?page=<?php echo $_GET['page'] + 1 ?>" class="<?php echo $_GET['page'] + 1 <= $pageLinks ? '' : 'none' ?>">NEXT</a>
            </div>
        </article>
    </main>
    <footer>
        <address>PH24</address>
    </footer>
</body>

</html>