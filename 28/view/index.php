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
    <!-- jquery -->
    <script src="js/jquery-3.5.1.min.js"></script>
</head>

<body>
    <?php require_once 'base/indexHeader.php';
    require_once 'base/modalNav.php' ?>
    <main class="c-padding-bottom_50">
        <article class="l-container">
            <h2 class="c-font-config-h2_38 c-text-center c-padding-bottom_75">NEWS</h2>
            <div class="c-padding-bottom_100 c-flex">
                <p class="c-flex-basis_25"><img src="view/img/news3.jpg" alt="news" width="100%" height="100%" /></p>
                <p class="c-flex-basis_15 c-text-center ">Archives</p>
                <div class="c-flex-basis_60">
                    <?php foreach ($newsLists as $news) { ?>
                        <ul class="c-flex c-padding-bottom_30">
                            <div class="c-flex-basis_80">
                                <div class="c-flex">
                                    <li class="c-padding-bottom_30"><?php echo $news['created_at'] ?><span class="c-margin-row_10">-</span></li>
                                    <li><?php echo $news['title'] ?></li>
                                </div>
                                <li><?php echo $news['content'] ?></li>
                            </div>
                            <li class="c-flex-basis_20 c-text-center">
                                <form method="post">
                                    <input type="hidden" name="pdfId" value="<?php echo $news['id'] ?>" />
                                    <button type="submit" name="pdf" class="c-entry-button">PDFdl</button>
                                </form>
                            </li>
                        </ul>
                        <div class="c-border-bottom_grey c-margin-bottom_30">&nbsp</div>
                    <?php } ?>
                </div>
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
    <script src="js/modal.js"></script>
</body>

</html>