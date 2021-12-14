<?php
require_once '../../const.php';
require_once 'model/sql/CRUD.php';
require_once 'model/sql/Login.php';
// 定数
const NOT_EXISTS = 'ユーザは存在しません';
// 変数
$err = [
    'not' => '',
];
session_start();
// ボタン送信
if (isset($_POST['submit'])) {

    $link = new Login;
    // ログイン
    if ($sql = $link->loginCheck()) {
        setcookie('state', $sql['hash_login_id'], time() + 60 * 60 * 24 * 30, '/');
        $_SESSION['id'] = $sql['id'];
        $_SESSION['name'] = $sql['name'];
        $_SESSION['file_name'] = $sql['file_name'];
        header('Location:index.php?page=0');
        exit;
    } else {
        $err['not'] = NOT_EXISTS;
    }
}

require_once 'view/login.php';
