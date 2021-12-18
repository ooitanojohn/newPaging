<?php
session_start();
// 定数
require_once '../../config.php';
// 関数
require_once 'model/utility/Hash.php'; // ハッシュ
require_once 'model/sql/CRUD.php'; // PDO
require_once 'model/sql/Create.php';
$passNum = 0;
$password = '';
// 前に戻るボタン押した
if (isset($_POST['back'])) {
    $_SESSION['reWrite'] = '再度パスワードを入力してください';
    header('Location:entry.php');
    exit;
}
if (!isset($_SESSION['name'])) {
    header('Location:entry.php');
    exit;
} else {
    $passNum = mb_strlen($_SESSION['password']);
    for ($i = 0; $i < $passNum; $i++) {
        $password .= '●';
    }
}
// 登録ボタン押した
if (isset($_POST['entry'])) {
    $User = new CreateUser();
    // ハッシュ化
    list($hashLoginId) = $User->hashed($_SESSION['loginId']);
    list($password, $salt, $stretch) = $User->hashed($_SESSION['password']);
    // DBに登録
    $User->createUser($_SESSION['name'], $_SESSION['mail'], $_SESSION['loginId'], $password, $hashLoginId, $salt, $stretch);
    // メール送信
    // $User->entryMailSend($_SESSION['name'], $_SESSION['mail'], $hashLoginId);
    // 登録完了画面へ移行
    $User = NULL;
    $_SESSION['hashLoginId'] = $hashLoginId;
    header('Location:complete.php');
    exit;
}
// main confirm
require_once 'view/confirm.php';
