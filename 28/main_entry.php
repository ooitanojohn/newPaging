<?php
session_start();
require_once '../../config.php';
require_once 'model/sql/CRUD.php';
require_once 'model/sql/Create.php';

// 定数
const NOT_EXISTS = 'ユーザは存在しません';
const IMG_EXTERN = '画像ファイルはjpgを選択してください';
// 変数
$err = [
    'not' => '',
    'imgExt' => '',
];
$link = new resistUser;
// 仮登録済みか確認
if (isset($_GET['entryComplete']) && !empty($sql = $link->checkTempEntry($_GET['entryComplete']))) {
} else {
    header('Location:entry.php');
    exit;
}
// 登録ボタン押した
if (isset($_POST['submit'])) {
    // パスワードあっているか
    if (!$link->checkPassword($sql['id'], $sql['salt'], $sql['stretch'])) {
        $err['not'] = NOT_EXISTS;
    }
    // 画像登録
    // jpgであれば保存 else errMsg
    if (!$link->uploadFile($sql['id'])) {
        $err['imgExt'] = IMG_EXTERN;
    }
    $errJudge = array_filter($err);
    if (empty($errJudge)) {
        // サムネイル作成
        $link->imgCompress($sql['id']);
        // userState = 1 && 元ファイル名update
        $link->resistUser($sql['id']);
        header('Location:main_complete.php');
        exit;
    }
}

require_once 'view/main_entry.php';
