<?php

class PDF extends CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getContents($id)
    {
        $sql = "SELECT content FROM m_news WHERE id = :id";
        $pdo = $this->link->prepare($sql);
        $pdo->bindValue(':id', $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch(PDO::FETCH_ASSOC);
    }
}
