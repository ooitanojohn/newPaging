<?php
require_once '../../const.php';
try {
    $link = new PDO('mysql:dbname=' . DB_NAME . ';host=' . HOST . PORT . ';charset=utf8mb4', USER_ID, PASSWORD);
} catch (PDOException $err) {
    exit('DB接続エラー:' . $err->getMessage());
}
// ページング
// 1
// 現在のページ番号
if (isset($_GET['page'])) {
    // 現在のページの要素の最初のiD番号
    $nowPageElement = $_GET['page'] * 5;
} else {
    // 最初のページ
    $_GET['page'] = 0;
    $nowPageElement = 0;
}
// 一覧表示
// $GET[page]の要素表示
$sql = 'SELECT * FROM m_news ORDER BY created_at DESC LIMIT :start,5';
$pdo = $link->prepare($sql);
$pdo->bindValue(':start', $nowPageElement, PDO::PARAM_INT);
$pdo->execute();
$newsDatas = $pdo->fetchAll(PDO::FETCH_NAMED);

// ページリンク作成
// DB内の件数表示
$pdo = $link->query('SELECT count(*) FROM m_news');
$DBNums = $pdo->fetch(PDO::FETCH_NUM);
$DBNums = intval($DBNums[0]);
// 最大ページ求める
if ($DBNums % 5 === 0) {
    $pageLinks = intval($DBNums / 5) - 1;
} else {
    $pageLinks = intval($DBNums / 5);
}

require_once 'view/index.php';
