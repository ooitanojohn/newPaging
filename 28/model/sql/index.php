<?php
class Login extends CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cookieCheck($id)
    {
        // ソルト,ストレッチ取得する
        $cookie = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql = "SELECT id FROM m_user WHERE user_state = 1 && id = :id && hash_login_id = :hashLoginId";
        $pdo = $this->link->prepare($sql);
        $pdo->bindValue(':id', $id, PDO::PARAM_STR);
        $pdo->bindValue(':hashLoginId', $cookie['state'], PDO::PARAM_STR);
        $pdo->execute();
        return !empty($pdo->fetch(PDO::FETCH_ASSOC));
    }
}
