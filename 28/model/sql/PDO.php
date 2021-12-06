<?php
require_once '../../../../const.php';
/**
 * SQL接続
 *
 */
class SQL
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
