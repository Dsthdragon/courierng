<?php

class index extends controller
{
  function __construct()
  {
    parent::__construct();
    auth::hangin();
  }

  function index()
  {
    $this->view->render('header');
    $this->view->render('index/index');
    $this->view->render('footer');
  }
}
