<?php

 class login_model extends model
 {
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function login()
 	{
 		$sth = $this->db->prepare("SELECT * FROM admin WHERE (email = :email OR username = :email) AND password = :pass ");
 		$sth->execute(array(':pass' => hash::create("sha256",$_POST['password'],HASH_PASSWORD_KEY), ':email' => $_POST['username']));
 		if($sth->rowCount() > 0)
 		{
 			$data = $sth->fetch();
 			session::init();
 			session::set("loggedIn", true);
 			session::set("username", $data['username']);
 			session::set("role", $data['role']);
 			session::set("uid", $data['id']);
 			header('location:'.URL.'webmaster');
 		} else {
 			return array("Invalid username/password Try again");
 		}
 	}
 }
