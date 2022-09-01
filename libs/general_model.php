<?php

class general_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getCategory($id)
    {
        $sth = $this->db->prepare("SELECT * FROM category WHERE id =:id");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function getAdmin($id)
    {
        $sth = $this->db->prepare("SELECT * FROM admin WHERE id =:id");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function getPostComments($id)
    {
        $sth = $this->db->prepare("SELECT * FROM comments WHERE post = :id");
        $sth->execute(array(':id' => $id));
        return $sth->rowCount();
    }

    function getTags(){
        return $this->db->select("SELECT * FROM tags ORDER BY tag ASC");
    }

    function categories($id){
        return $this->db->select("SELECT * FROM category WHERE top = :i", array(':i' => $id));
    }

    function getTag($id){
        $sth = $this->db->prepare("SELECT * FROM tags WHERE id = :id");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function randomPost() {
        return $this->db->select("SELECT * FROM post ORDER BY RAND() LIMIT 4");
    }

    function getSameCategoryPost($id)
    {
        return $this->db->select("SELECT * FROM post WHERE category = :id ORDER BY created_by DESC LIMIT 3", array(':id' => $id));
    }

    function getTopPost()
    {
        return $this->db->select("SELECT * FROM post WHERE top = 1 ORDER BY created_by DESC LIMIT 4");
    }
}