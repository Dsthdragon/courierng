<?php
 class tag extends controller{
 
 	public function __construct()
 	{
 		parent::__construct();
 		$this->view->css = array('tag/extra/css/default.css');
 		$this->view->js = array('tag/extra/js/default.js');
 	}
 

 	

 	public function index()
 	{
 		$this->view->tags = $this->model->getTags();
 		$this->view->render('header');
 		$this->view->render('tag/index');
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
        $this->view->render("tag/posts");
        $this->view->render("footer");
 	}
 }
