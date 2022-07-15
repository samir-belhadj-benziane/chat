<?php


class Group extends DataBase
{

    private $pdo;
    private $database;

    public string $namegroup;


    public function getAllGroupById()
    {
        $getallinfos = $this->connect()->prepare("SELECT * FROM users_coversation WHERE id_user = ?");
        $getallinfos->execute(array($_SESSION['accord_id_user']));
        $getallinfosinfo = $getallinfos->fetchAll();
        return $getallinfosinfo;
    }

    public function getAllGroupInfosById($id)
    {
        $getallinfos = $this->connect()->prepare("SELECT * FROM conversation WHERE id = ?");
        $getallinfos->execute(array($id));
        $getallinfosinfo = $getallinfos->fetch();
        return $getallinfosinfo;
    }

    public function getAllMessagesById($id)
    {
        $getallinfos = $this->connect()->prepare("SELECT * FROM message WHERE id_conversation = ? ORDER BY id ASC");
        $getallinfos->execute(array($id));
        $getallinfosinfo = $getallinfos->fetchAll();
        return $getallinfosinfo;
    }
}

$group = new Group();
