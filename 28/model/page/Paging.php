<?php

/**
 *ページング 引数 現在のページ数,ページ一覧表示する初めの数
 *@param int $_GET['page']
 */
class Paging extends SQL
{
    protected int $GetPageNum;
    protected int $pageElementStart;

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
        // 親メソッドを呼び出し
        parent::__construct();
    }
    /**
     * 全件そのまま取得 返り値 DBデータ一覧,最大ページリンク数
     * @return array $dataLists
     * @return int $pageLinks
     */
    public function getPageAll()
    {
        $sql = 'SELECT * FROM m_news ORDER BY created_at DESC LIMIT :start,5';
        $pdo = $this->link->prepare($sql);
        $pdo->bindValue(':start', $this->pageElementStart, PDO::PARAM_INT);
        $pdo->execute();
        $dataLists = $pdo->fetchAll(PDO::FETCH_NAMED);

        $pdo = $this->link->query('SELECT count(*) FROM m_news');
        $DBNum = $pdo->fetch(PDO::FETCH_NUM);
        $DBNum = intval($DBNum[0]);
        if ($DBNum % 5 === 0) {
            $pageLinks = intval($DBNum / 5) - 1;
        } else {
            $pageLinks = intval($DBNum / 5);
        }
        return [$dataLists, $pageLinks]
    }
    // 検索条件 etc..

    // pageLink表示onoff
    // 前に戻る
    public function pageLinkBack($GET)
    {
        $pageLinkBack = $_GET['page'] - 1;
        $pLBclass = $GET - 1 >= 0 ? '' : 'none';
        return [$pageLinkBack, $pLBclass]
    }
    // ページ6ページ以上から表示
    public function pageLinkTop($GET)
    {
        return $_GET - 5 <= 0 ? 'none' : ''
    }
    // ページ前後10ページを表示
    public function
    // max-5 ページ以下から表示

    // 次に進む
}
// 1 GET値を取得 controller
// $Paging = new Paging(isset($_GET['page']) === true ? $_GET['page'] : NULL);
// var_dump($Paging);
// 2 GET値 * 表示数の要素を一覧表示 model
// 3 ページリンク作成 必要ページ数を求める model
// list($dataLists, $pageLinks) = $Paging->getPageAll();


// 1 GET値を取得 controller
// if (isset($_GET['page'])) {
//     $nowPageElement = $_GET['page'] * 5;
// } else {
//     $_GET['page'] = 0;
//     $nowPageElement = 0;
// }
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
