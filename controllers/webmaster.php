<?php
class webmaster extends controller{

	public function __construct()
	{
		parent::__construct();
		auth::handleLogin();
		$this->view->css = array('webmaster/extra/css/default.css');
		$this->view->js = array('webmaster/extra/js/default.js');
	}


	public function index()
	{
		$this->view->drafts = $this->model->getPublishedPosts(0);
		$this->view->posts = $this->model->getPosts();
		$this->view->categories = $this->model->get_categories();
		$this->view->tags  = $this->model->getTags();
		$this->view->activePage = "index";
		$this->view->render('admin.header');
		$this->view->render('webmaster/index');
		$this->view->render('admin.footer');
	}

	public function posts()
	{
		if(!empty($_POST['form']))
		{
			if($_POST['form'] == "editAll") {
				$this->view->output = $this->model->editAll();
			} else if($_POST['form'] == "publishPost") {
				$this->view->output = $this->model->publishPost();
			} else if($_POST['form'] == "deletePost") {
				$this->view->output = $this->model->deletePost();
			}
		}
		$this->view->posts = $this->model->getPosts();
		$this->view->activePage = "posts";
		$this->view->render('admin.header');
		$this->view->render('webmaster/posts');
		$this->view->render('admin.footer');
	}

	public function published()
	{
		$this->view->posts = $this->model->getPublishedPosts(1);
		$this->view->activePage = "published";
		$this->view->render('admin.header');
		$this->view->render('webmaster/posts');
		$this->view->render('admin.footer');
	}

	public function create()
	{
		if(!empty($_POST['form']))
		{
			if($_POST['form']  == "createPost")
			{
				$this->view->output = $this->model->createPost();
			}
		}
		$this->view->categories = $this->model->get_categories();
		$this->view->activePage = "create_post";
		$this->view->render('admin.header');
		$this->view->render('webmaster/create_post');
		$this->view->render('admin.footer');
	}

	public function post($id)
	{
		if(!empty($_POST['form']))
		{
			if($_POST['form'] == "updatePost")
			{
				$this->view->output = $this->model->updatePost($id);
			} else if($_POST['form'] == "updatePostImg"){
				$this->view->output = $this->model->updatePostImg($id);
			} else if($_POST['form'] == 'addPostTagForm')
			{
				$this->view->output = $this->model->addPostTag($id);
			}
		}
		$this->view->tags  = $this->model->getTags();
		$this->view->post = $this->model->getPost($id);
		$this->view->categories = $this->model->get_categories();
		$this->view->activePage = "post";
		$this->view->render("admin.header");
		$this->view->render("webmaster/post");
		$this->view->render("admin.footer");
	}

	public function categories()
	{
		if(!empty($_POST['form']))
		{
			if($_POST['form'] == "createCategory")
			{
				$this->view->output = $this->model->createCategory();
			}elseif($_POST['form'] == 'deleteCategory')
			{
				$this->view->output = $this->model->deleteCategory();
			}elseif($_POST['form'] == 'toggleNav')
			{
				$this->view->output = $this->model->toggleNav();
			}
		}
		$this->view->activePage = "categories";
		$this->view->categories = $this->model->get_categories();
		$this->view->render('admin.header');
		$this->view->render('webmaster/categories');
		$this->view->render('admin.footer');
	}

	public function tags()
	{
		if(!empty($_POST['form']))
		{
			if($_POST['form'] == 'createTag')
			{
				$this->view->output = $this->model->createTag();
			} else if($_POST['form'] == 'deleteTag')
			{
				$this->view->output = $this->model->deleteTag();
			}
		}
		$this->view->activePage = "tags";
		$this->view->tags  = $this->model->getTags();
		$this->view->render('admin.header');
		$this->view->render('webmaster/tags');
		$this->view->render('admin.footer');
	}

	public function comments()
	{
		if(!empty($_POST['form']))
		{
			if($_POST['form'] == 'publishComment')
			{
				$this->view->output = $this->model->publishComment();
			} else if($_POST['form'] == 'deleteComment')
			{
				$this->view->output = $this->model->deleteComment();
			}
		}
		$this->view->comments = $this->model->getComments();
		$this->view->activePage = "comments";
		$this->view->render('admin.header');
		$this->view->render('webmaster/comments');
		$this->view->render('admin.footer');
	}

	public function published_comments()
	{
		$this->view->activePage = "published_comment";
		$this->view->render('admin.header');
		$this->view->render('webmaster/comments');
		$this->view->render('admin.footer');
	}

	public function administrators()
	{
		if(!empty($_POST['form']))
		{
			if($_POST['form'] == "createAdmin")
			{
				$this->view->output = $this->model->createAdmin();
			}
		}
		$this->view->activePage = "administrators";
		$this->view->admins = $this->model->getAdmins();
		$this->view->render('admin.header');
		$this->view->render('webmaster/admin');
		$this->view->render('admin.footer');
	}

	public function logout()
	{
		session::destroy();
		header("location:" . URL ."login");
		exit();
	}
}
