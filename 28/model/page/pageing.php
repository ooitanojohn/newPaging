<?php

/**
 *ページング 引数 現在のページ数,ページ一覧表示する初めの数
 *@param int $_GET['page']
 */
class Pageing
{
    protected int $GetPageNum;
    protected int $PageElementStart;
    // 1 GET値を取得 controller
    public function __construct($GetPageNum)
    {
        if (isset($GetPageNum)) {
            $this->GetPageNum = $GetPageNum;
            $this->pageElementStart = $GetPageNum * 5;
        } else {
            $this->GetPageNum = 0;
            $this->pageElementStart = 0;
        }
    }
    // 全件表示
    protected function getPageAll()
    {
        $sql = 'SELECT * FROM m_news ORDER BY created_at DESC LIMIT :start,5';
        $pdo = $link->prepare($sql);
        $pdo->bindValue(':start', $nowPageElement, PDO::PARAM_INT);
        $pdo->execute();
        $newsDatas = $pdo->fetchAll(PDO::FETCH_NAMED);

        $pdo = $link->query('SELECT count(*) FROM m_news');
        $DBNums = $pdo->fetch(PDO::FETCH_NUM);
        $DBNums = intval($DBNums[0]);
        if ($DBNums % 5 === 0) {
            $pageLinks = intval($DBNums / 5) - 1;
        } else {
            $pageLinks = intval($DBNums / 5);
        }
    }
    // 検索条件 etc..
}
$Pageing = new Pageing(isset($_GET['page']));
var_dump($Pageing);

// 1 GET値を取得 controller
if (isset($_GET['page'])) {
    $nowPageElement = $_GET['page'] * 5;
} else {
    $_GET['page'] = 0;
    $nowPageElement = 0;
}
// 2 GET値 * 表示数の要素を一覧表示 model
// $sql = 'SELECT * FROM m_news ORDER BY created_at DESC LIMIT :start,5';
// $pdo = $link->prepare($sql);
// $pdo->bindValue(':start', $nowPageElement, PDO::PARAM_INT);
// $pdo->execute();
// $newsDatas = $pdo->fetchAll(PDO::FETCH_NAMED);

// // 3 ページリンク作成 必要ページ数を求める model
// $pdo = $link->query('SELECT count(*) FROM m_news');
// $DBNums = $pdo->fetch(PDO::FETCH_NUM);
// $DBNums = intval($DBNums[0]);
// if ($DBNums % 5 === 0) {
//     $pageLinks = intval($DBNums / 5) - 1;
// } else {
//     $pageLinks = intval($DBNums / 5);
// }
