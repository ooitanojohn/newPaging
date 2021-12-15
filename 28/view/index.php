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
    <?php require_once 'base/header.php' ?>
    <header>
        <p><?php echo $_SESSION['name'] ?>さん</p>
        <nav>
            <div>
                <p><img src="<?php echo DIR_IMG . $_SESSION['id'] . '/' . 'thumb_' . $_SESSION['file_name'] ?>" alt="サムネイル画像" width="60" height="70"></p>
            </div>
            <form method="post">
                <button type="submit" name="logout">ログアウト</button>
            </form>
        </nav>
    </header>
    <main class="c-padding-bottom_50">
        <article>
            <h2>&nbsp;</h2>
            <div class="c-padding-bottom_50">
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
            </div>
            <!-- ページネーション -->
            <div class="c-flex c-justify-content-center" id="u-pageNav">
                <!-- 前に戻る -->
                <div class="c-label-bottom-hover">
                    <a href="index.php?page=<?php echo $_GET['page'] - 1 ?>" class="<?php echo $pLBclass ?> c-label-bottom-text">BACK</a>
                </div>
                <!-- 0ページ目  6ページ以上から表示-->
                <div class="c-label-bottom-hover">
                    <a href="index.php?page=0" class="<?php echo $pLTclass ?> c-label-bottom-text">0</a>
                </div>
                <!-- ... 6ページ以上から表示 -->
                <span class="<?php echo $pLTclass ?> c-margin-right_5">...</span>
                <!-- 前後10ページを表示-->
                <ul class="c-flex p-list-label-bottom-hover">
                    <?php for ($i = $_GET['page'] + $pageLinkNum[0]; $i <= $_GET['page'] + $pageLinkNum[1]; $i++) { ?>
                        <li class="c-margin-right_5">
                            <a href="index.php?page=<?php echo $i ?>" class="<?php echo $i == $_GET['page'] || $i < 0 || $i > $pageLinks ? 'none' : '' ?>"><?php echo $i ?></a>
                        </li>
                    <?php } ?>
                </ul>
                <!-- ... max-5ページ以下から表示-->
                <span class="<?php echo $pageLinkLast ?> c-margin-right_5">...</span>
                <!-- 最後のページ max-5 ページ以下から表示-->
                <div class="c-label-bottom-hover">
                    <a href="index.php?page=<?php echo $pageLinks ?>" class="<?php echo $pageLinkLast ?> c-label-bottom-text"><?php echo $pageLinks ?></a>
                </div>
                <!-- 次に進む -->
                <div class="c-label-bottom-hover">
                    <a href="index.php?page=<?php echo $_GET['page'] + 1 ?>" class="<?php echo $_GET['page'] + 1 <= $pageLinks ? '' : 'none' ?> c-label-bottom-text">NEXT</a>
                </div>
            </div>
        </article>
    </main>
    <?php require_once 'base/footer.php' ?>
</body>

</html>