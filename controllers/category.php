<?php
 class category extends controller{
 
 	public function __construct()
 	{
 		parent::__construct();
 		$this->view->css = array('category/extra/css/default.css');
 		$this->view->js = array('category/extra/js/default.js');
 	}
 

 	public function index()
 	{
 		$this->view->categories = $this->model->getCategories();
 		$this->view->render('header');
 		$this->view->render('category/index');
 		$this->view->render('footer');
 	}

 	public function i($id, $title, $currentPag = 1)
 	{
        if ($currentPag < 1) {
            $this->view->currentPag = 1;
        } else {
            $this->view->currentPag = $currentPag;
        }
        $this->view->posts = $this->model->getPost($id);
        $this->view->render("header");
        $this->view->render("category/posts");
        $this->view->render("footer");
 	}
 }
