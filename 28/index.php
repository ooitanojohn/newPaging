<?php
// 定数
require_once '../../const.php';

// 関数
// SQL
require_once 'model/sql/PDO.php';
// paging
require_once 'model/page/Paging.php';

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

require_once 'view/index.php';
