<?php

 class tag_model extends model
 {
 	function __construct()
 	{
 		parent::__construct();
 	}

 	function getTags()
 	{
 		return $this->db->select("SELECT * FROM tags ORDER BY tag ASC");
 	}

 	function getPost($id)
 	{
 		return $this->db->select("SELECT * FROM post WHERE {$id} IN (tags) AND published = 1 ORDER BY created_at DESC");
 	}
 }
