<?php
session_start();
// 定数
require_once '../../const.php';

// 関数
// SQL
require_once 'model/sql/CRUD.php';
require_once 'model/sql/index.php';
// paging
require_once 'model/page/Paging.php';
// PDF
require_once PDF_PATH;

// ログイン || ログアウト状態
if (!isset($_COOKIE['state'])) {
    header('Location:login.php');
    exit;
}
// cookie値にhashLoginIdを持っていなければlogin.phpへ
$state = new Login;
if ($state->cookieCheck($_SESSION['id']) == false) {
    header('Location:login.php');
    exit;
}
// ログアウト
if (isset($_POST['logout'])) {
    setcookie('state', $sql['hash_login_id'], time() - 1800, '/');
    session_destroy();
    header('Location:login.php');
    exit;
}

// ページング
// 1 GET値を取得 controller
$Paging = new Paging(isset($_GET['page']) === true ? $_GET['page'] : NULL);
// 2 GET値 * 表示数の要素を一覧表示 model
// 3 ページリンク作成 必要ページ数を求める model
list($newsLists, $pageLinks) = $Paging->getPageAll();
// 4 ページリンク 表示 && onoff
// 前に戻る
list($pageLinkBack, $pLBclass) = $Paging::pageLinkBack($_GET['page']);
// 6ページ以上から表示
$pLTclass = $Paging::pageLinkTop($_GET['page']);
// 前後10ページを表示
$pageLinkNum = $Paging::pageLinkNum($_GET['page'], $pageLinks);
// max-5 ページ以下から表示
$pageLinkLast = $Paging::pageLinkLast($_GET['page'], $pageLinks);
// 次に進む


// PDF
if (isset($_POST['pdf'])) {
    // 日本語 用紙設定
    $mpdf = new \Mpdf\Mpdf([
        'font-data' => [
            'ipa' => [
                'R' => 'ipag.ttf'
            ]
        ],
        'format' => 'A4-P',
        'mode' => 'ja',
    ]);
    // PDFに出力
    $html = file_get_contents(BASE_URL . '/28/' . 'pdf_download.php?pdfId=' . $_POST['pdfId']);
    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::DEFAULT_MODE);
    // Output
    $mpdf->output('dl' . date('Ymdhis') . '.pdf', 'D');
}

require_once 'view/index.php';
