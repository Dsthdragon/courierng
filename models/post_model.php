<?php

 class post_model extends model
 {
 	function __construct()
 	{
 		parent::__construct();
 	}

 	function getPost($id)
 	{
 		$sth = $this->db->prepare("SELECT * FROM post WHERE id = :id AND published = 1");
 		$sth->execute(array(':id' => $id));
 		return $sth->fetch();
 	}

 	function comment($id)
 	{
 		$error = array();
 		foreach($_POST as $key => $value)
 		{
 			if($value = null)
 			{
 				$error[] = "All field are required!";
 				break;
 			}
 		}
 		if(!validator::email($_POST['email']))
 		{
 			$error[] = "Enter a valid email address!";
 		}
 		if(empty($error))
 		{
 			$data = array();
 			$data['name'] = $_POST['name'];
 			$data['email'] = $_POST['email'];
 			$data['comment'] = $_POST['message'];
 			$data['post'] = $id;
 			$this->db->insert("comments", $data);
 			return "Comment uploaded. pending approval!";
 		} else {
 			return $error;
 		}
 	}

 	function comments($id)
 	{
 		return $this->db->select("SELECT * FROM comments WHERE post = :id AND published = 1 ORDER BY created_at ASC", array(':id' => $id));
 	}
 }
