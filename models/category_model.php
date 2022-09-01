<?php

 class category_model extends model
 {
 	function __construct()
 	{
 		parent::__construct();
 	}

 	function getCategories()
 	{
 		return $this->db->select("SELECT * FROM category ORDER BY title ASC");
 	}

 	function getPost($id)
 	{
 		return $this->db->select("SELECT * FROM post WHERE category = :id AND published = 1 ORDER BY created_at DESC", array(':id' => $id));
 	}
 }
