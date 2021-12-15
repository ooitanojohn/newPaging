<?php
session_start();
// 変数
// 値受け取り用
$post = [
    'name' => '',
    'loginId' => '',
    'password' => '',
    'mail' => '',
];
// msg用
$msg = [
    'reWrite' => ''
];
$err = [
    'name' => ['empty' => ''],
    'loginId' => ['empty' => ''],
    'password' => ['empty' => ''],
    'mail' => [
        'empty' => '',
        'validate' => '',
    ],
];
// 定数
const ERR_MAIL = '妥当なアドレスを入力してください';
const ERR_EMPTY = '入力してください';
// 関数
// viewエスケープ処理
require_once 'model/utility/View.php';
require_once 'model/utility/Validate.php';

// temp entry
// 前に戻るボタン押した
if (isset($_SESSION['reWrite'])) {
    $post = filter_var_array($_SESSION);
    $msg['reWrite'] = $_SESSION['reWrite'];
}

// 登録ボタン押した
if (isset($_POST['submit'])) {
    // コンストラクタでサニタイズ
    // validate
    // 全項目必須チェック
    $post = new Validation;
    $posts = $post->validateNull();
    foreach ($posts as $key => $val) {
        if ($val !== null) {
            $err[$key]['empty'] = ERR_EMPTY;
        }
    }
    // mail妥当性
    if ($post->validateMail() && empty($err['mail']['empty'])) {
        $err['mail']['validate'] = ERR_MAIL;
    }
    $post = $post->getPost();
    // err無しで sessionにデータ保存して confirmへ
    foreach ($err as $key => $val) {
        $errJudge[] = array_filter($err[$key]);
    }
    $errJudge = array_filter($errJudge);
    if (empty($errJudge)) {
        $_SESSION['name'] = $post['name'];
        $_SESSION['loginId'] = $post['loginId'];
        $_SESSION['password'] = $post['password'];
        $_SESSION['mail'] = $post['mail'];
        header('Location:confirm.php');
        exit;
    }
}

require_once 'view/entry.php';
