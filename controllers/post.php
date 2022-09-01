<?php
 class post extends controller{
 
 	public function __construct()
 	{
 		parent::__construct();
 		$this->view->css = array('post/extra/css/default.css');
 		$this->view->js = array('post/extra/js/default.js');
 	}
 

 	public function i($id, $name)
 	{
 		if(!empty($_POST['form']))
 		{
 			if($_POST['form'] == "commentForm")
 			{
 				$this->view->output = $this->model->comment($id);
 			}
 		}
 		$this->view->post = $this->model->getPost($id);
 		$this->view->title = $this->view->post['title'];
 		$this->view->comments = $this->model->comments($id);
 		$this->view->render('header');
 		$this->view->render('post/index');
 		$this->view->render('footer');
 	}
 }
