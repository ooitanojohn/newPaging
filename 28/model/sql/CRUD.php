<?php

/**
 * SQL接続
 *
 */
class CRUD
{
    protected object $link;

    public function __construct()
    {
        try {
            $link = new PDO('mysql:dbname=' . DB_NAME . ';host=' . HOST . PORT . ';charset=utf8mb4', USER_ID, PASSWORD);
            $this->link = $link;
        } catch (PDOException $err) {
            exit('DB接続エラー:' . $err->getMessage());
        }
    }
}
