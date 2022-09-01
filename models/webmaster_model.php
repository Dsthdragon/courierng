<?php

class webmaster_model extends model
{
	function __construct()
	{
		parent::__construct();
	}

 	// CREATE CATEGORIES FUNCTION

	public function get_categories()
	{
		return $this->db->select("SELECT * FROM category ORDER BY parent ASC");
	}

	public function createCategory()
	{
		$error = array();
		foreach($_POST as $key => $value)
		{
			if($value == null)
			{
				$error[] = "All fields are required!";
				break;
			}
		}

		if(empty($error))
		{
			$data = array();
			$data['title'] =  $_POST['title'];
			$data['description'] = $_POST['description'];
			$data['parent'] = $_POST['parent'];
			$this->db->insert("category", $data);
			return "Category created";
		} else {
			return $error;
		}
	}

	public function deleteCategory()
	{
		$sth = $this->db->prepare("SELECT * FROM category WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$this->db->delete("category", "id = {$_POST['id']}");
			return "Category deleted";
		} else {
			return array("Category not found!");
		}
	}

	public function toggleNav()
	{
		$sth = $this->db->prepare("SELECT * FROM category WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$data =  $sth->fetch();
			if($data['top'] == 0)
			{
				$this->db->update("category",array('top' => 1), "id = {$_POST['id']}");
				return "Category added to navbar";
			} else {

				$this->db->update("category",array('top' => 0), "id = {$_POST['id']}");
				return "Category removed from navbar";
			}

		} else {
			return array("Category not found!");
		}
	}

 	// admin
	public function getAdmins()
	{
		return $this->db->select("SELECT * FROM admin");
	}

	public function createAdmin()
	{
		$error = array();
		foreach($_POST as $key => $value){
			if($value == null)
			{
				$error[] = "All field are required!";
				break;
			}
		}

		$user = $this->db->prepare("SELECT * FROM admin WHERE username = :user");
		$user->execute(array(':user' => $_POST['username']));
		if($user->rowCount() > 0)
		{
			$error[] = "Username already in the database";
		}

		$email = $this->db->prepare("SELECT * FROM admin WHERE email = :email");
		$email->execute(array(':email' => $_POST['email']));
		if($email->rowCount() > 0)
		{
			$error[] = "Email address already in the database";
		} else if(validator::email($_POST['email']) == false)
		{
			$error[] = "Email address not valid!";
		}
		if(empty($error))
		{
			$data = array();
			$data['username'] = $_POST['username'];
			$data['email'] = $_POST['email'];
			$data['role'] = $_POST['role'];
			$data['fullname'] = $_POST['fullname'];
			$data['password'] = hash::create("sha256", "123456", HASH_PASSWORD_KEY);
			$this->db->insert("admin", $data);
			return "Admin created!";
		} else {
			return $error;
		}
	}

	// posts
	function createPost()
	{
		$error = array();
		foreach ($_POST as $key => $value) {
			if($value == null){
				$error[] = "All fields are required!";
			}
		}
		if(empty($error))
		{
			$data = array();
			$data['created_by'] = $_SESSION['uid'];
			$data['category'] = $_POST['category'];
			$data['title'] = $_POST['title'];
			$data['published'] = $_POST['publish'];
			$data['post'] = $_POST['post'];
			$this->db->insert("post", $data);
			$id = $this->db->lastinsertid();
			header('location:'.URL.'webmaster/post/'.$id);
		}
	}

	function updatePost($id)
	{
		$error = array();
		foreach ($_POST as $key => $value) {
			if($value == null){
				$error[] = "All fields are required!";
			}
		}
		if(empty($error))
		{
			$data = array();
			$data['top'] = 0;
			if(isset($_POST['top'])){
				$data['top'] = 1;
			}
			$data['created_by'] = $_SESSION['uid'];
			$data['category'] = $_POST['category'];
			$data['title'] = $_POST['title'];
			$data['published'] = $_POST['publish'];
			$data['post'] = $_POST['post'];
			$data['abstract'] = $_POST['abstract'];
			$this->db->update("post", $data, "id = {$id}");
			return "Post Updated!";
		} else {
			return $error;
		}
	}


	function updatePostImg($id)
	{
		$error = array();
		$sth = $this->db->prepare("SELECT * FROM post WHERE id = :id");
		$sth->execute(array(':id' => $id));
		$data = $sth->fetch();
		
		if(empty($_FILES['img']['name'])){
			$error[] = "Kindly upload an image";
		}

		if(empty($error))
		{

			$ext = explode('.',$_FILES['img']['name']);
			$ext = end($ext);
			$ext = strtolower($ext);
			$file = generato::random(20);
			$image = "public/upload/pictures/post/".$file.'.'.$ext;

			copy($_FILES['img']['tmp_name'], $image);
			$upload = new upload($image);
			$upload->image_fix_orientation($image);

			$resize = new resize($image);
			$resize->resizeImage(600,600, 'auto');
			$resize->saveImage($image, 100);

			if (file_exists(ROOT . "/" . $data['img'])) {
				unlink(ROOT . "/" . $data['img']);
			}
			$_data = array();
			$_data['img'] = $image;
			$this->db->update("post", $_data, "id = {$id}");
			return "Post thumbnail updated";
		} else {
			return $error;
		}


	}

	function addPostTag($id)
	{
		$tags = "";
		$x=0;
		foreach ($_POST['tags'] as $value) {
			if($x == 0){
				$tags = $value;
			} else{
				$tags .= ','.$value;
			}
			$x++;
		}
		if(!empty($_POST['tags']))
		{
			$this->db->update('post', array('tags' => $tags), "id = {$id}");
			return "Post Tags updated!";
		} else{
			return array("Kindly select a tag for post");
		}

	}

	function getPost($id)
	{
		$sth = $this->db->prepare("SELECT * FROM post WHERE id = :id");
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}

	function getPosts()
	{
		return $this->db->select("SELECT * FROM post ORDER BY created_at DESC");
	}

	function getPublishedPosts($i)
	{
		return $this->db->select("SELECT * FROM post WHERE published = :i ORDER BY created_at DESC", array(':i' => $i));
	}

	function editAll()
	{
		if($_POST['action'] == "publish"){
			foreach($_POST['posts'] as $key => $value)
			{
				$this->db->update("post", array('published' => 1), "id ={$value}");
			}
			return "All selected posts published";
		} else if($_POST['action'] == "draft")
		{
			foreach($_POST['posts'] as $key => $value)
			{
				$this->db->update("post", array('published' => 0), "id ={$value}");
			}
			return "All selected posts reverted to draft";
		} else if($_POST['action'] == "delete")
		{
			foreach($_POST['posts'] as $key => $value)
			{
				//$this->db->delete("post", "id ={$value}");
			}
			return "All selected posts deleted";
		}
	}

	function publishPost()
	{
		$sth = $this->db->prepare("SELECT * FROM post WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$data =  $sth->fetch();
			if($data['published'] == 0)
			{
				$this->db->update("post", array('published' => 1), "id ={$_POST['id']}");
				return "Post Published";
			} else {
				$this->db->update("post", array('published' => 0), "id ={$_POST['id']}");
				return "Post reverted to draft";
			}
		} else {
			return array('Post not found!');
		}
	}

	function deletePost()
	{
		$sth = $this->db->prepare("SELECT * FROM post WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$this->db->update("post", "id ={$_POST['id']}");
			return "Post deleted!";
		}else{
			return array("Post not found!");
		}
	}

	// tags

	function createTag()
	{
		$error = array();
		if($_POST['tag'] == null)
		{
			$error[] = "Enter tag!";
		}
		$sth = $this->db->prepare("SELECT * FROM tags WHERE tag = :tag");
		$sth->execute(array(':tag' => $_POST['tag']));
		if($sth->rowCount() > 0)
		{
			$error[] = "Tag already in database";
		}

		if(empty($error))
		{
			$this->db->insert("tags", array('tag' => $_POST['tag']));
			return "Tag added!";
		}
		else{
			return $error;
		}
	}

	function deleteTag()
	{
		$sth = $this->db->prepare("SELECT * FROM tags WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$this->db->delete("tags", "id = {$_POST['id']}");
			return "Tag deleted from database";
		} else {
			return array("Tag not found!");
		}
	}

	function getTags()
	{
		return $this->db->select("SELECT * FROM tags ORDER BY tag ASC");
	}

	// comments 

	function getComments() {
		return $this->db->select("SELECT * FROM comments ORDER BY created_at DESC");
	}

	function getPublishedComments() {
		return $this->db->select("SELECT * FROM comments WHERE ORDER BY created_at DESC");
	}


	function deleteComment() {
		$sth = $this->db->prepare("SELECT * FROM comments WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$this->db->delete("comments", "id = {$_POST['id']}");
			return "Comment deleted from database";
		} else {
			return array("Comment not found!");
		}		
	}



	function publishComment() {
		$sth = $this->db->prepare("SELECT * FROM comments WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$_data =$sth->fetch();
			$data = array();
			$data['published'] = 1;
			if($_data['published'] == 1){
				$data['published'] = 0;
			}
			$this->db->update("comments",$data, "id = {$_POST['id']}");
			return "Comment updated";
		} else {
			return array("Comment not found!");
		}		
	}
}
