<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?=(isset($this->title))?$this->title :NAME; ?>
    </title>

    <link rel="shortcut icon" href="<?php echo URL; ?>public/img/favicon.ico" />

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="<?php echo URL; ?>public/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/owl-carousel/owl.theme.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo URL;?>public/css/style.css"/>
    <link rel="stylesheet" href="<?php echo URL;?>public/css/default.css"/>
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="<?php echo URL; ?>public/font-awesome/css/font-awesome.css">

    <script src="<?php echo URL; ?>public/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>

    <script src="<?php echo URL; ?>public/js/default.js" type="text/javascript" ></script>
    <?php if (isset($this->js)) : ?>

        <?php foreach ($this->js as $js) : ?>
            <script type="text/javascript" src="<?= URL ?>views/<?= $js ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php  if (isset($this->css)) : ?>
        <?php foreach ($this->css as $css): ?>
            <link rel="stylesheet" href="<?= URL ?>views/<?= $css ?>"/>
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?php 
    session::init();
    $general = new general_model();
    $topNav = $general->categories(1);
    $otherNav = $general->categories(1);
    ?>
    <header>
        <!--Top-->
        <nav id="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Welcome to <?= NAME ?>!</strong>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-inline top-link link">
                            <li><a href="<?= URL; ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="<?= URL; ?>contact-us"><i class="fa fa-comments"></i> Contact</a></li>
                            <li><a href="#"><i class="fa fa-question-circle"></i> FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!--Navigation-->
        <nav id="menu" class="navbar container">
            <div class="navbar-header">
                <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
                <a class="navbar-brand" href="#">
                    <div class="logo"><span><?= NAME ?></span></div>
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">Home</a></li>

                    <?php foreach ($topNav as $key => $value): ?>
                        <li><a href="<?= URL.'category/i/'.$value['id'].'/'.$value['title']; ?>"><?= ucfirst($value['title']) ?></a></li>
                    <?php endforeach; ?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <i class="fa fa-arrow-circle-o-down"></i></a>
                        <div class="dropdown-menu" style="">
                            <div class="dropdown-inner">
                                <?php
                                $count = strtolower(count($otherNav) / 3);
                                ?>
                                <?php for($x= 1; $x <= 3; $x++): ?>
                                    <?php 
                                    $nav = paginator::paginate($otherNav, $count, $x);
                                    $nav = $nav[0];
                                    ?>
                                    <ul class="list-unstyled">
                                        <?php foreach ($nav as $key => $value): ?>
                                            <li class=""><a href="<?= URL.'category/i/'.$value['id'].'/'.$value['title']; ?>"><?= ucfirst($value['title']) ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </li>
                    <li><a href="archive.html"><i class="fa fa-cubes"></i> Blocks</a></li>
                    <li><a href="contact.html"><i class="fa fa-envelope"></i> Contact</a></li>
                </ul>
                <ul class="list-inline navbar-right top-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>   
    <?php $this->render('alert'); ?>
    <div class="container">