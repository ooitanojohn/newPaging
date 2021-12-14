<?php
class Login extends CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loginCheck()
    {
        // ソルト,ストレッチ取得する
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql = "SELECT salt,stretch FROM m_user WHERE user_state = 1 && login_id = :loginId";
        $sql = $this->link->prepare($sql);
        $sql->bindValue(':loginId', $post['name']);
        $sql->execute();
        $sql = $sql->fetch(PDO::FETCH_ASSOC);
        // rehashして整合確認
        if ($sql !== false) {
            for ($i = 0; $i < $sql['stretch']; $i++) {
                $post['password'] = md5($sql['salt'] . $post['password']);
            }
            $sql = "SELECT id,name,hash_login_id,file_name FROM m_user WHERE user_state = 1 && login_id = :loginId && password = :password";
            $sql = $this->link->prepare($sql);
            $sql->bindValue(':loginId', $post['name']);
            $sql->bindValue(':password', $post['password']);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
    }
}
