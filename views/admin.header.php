<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>
        <?= (isset($this->title)) ? $this->title : NAME; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="<?= URL; ?>adminpublic/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL; ?>adminpublic/summernote/summernote.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= URL; ?>adminpublic/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= URL; ?>adminpublic/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= URL; ?>adminpublic/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--Font-->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet' type='text/css'>
    <?php
    if (isset($this->css)) {
        foreach ($this->css as $css) {
            echo '<link rel="stylesheet" href="' . URL . 'views/' . $css . '"/>';
        }
    }
    ?>


    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= URL; ?>public/ico/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= URL; ?>public/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= URL; ?>public/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= URL; ?>public/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= URL; ?>public/ico/apple-touch-icon-57-precomposed.png">

    <!-- jQuery -->
    <script src="<?= URL; ?>adminpublic/js/jquery.js"></script>
    <script src="<?= URL; ?>adminpublic/js/tinymce/tinymce.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL; ?>adminpublic/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= URL; ?>adminpublic/summernote/summernote.min.js"></script>

</head>
<body>
    <?php
    session::init();
    $active = "";
    if (!empty($this->activePage)) {
        $active = $this->activePage;
    }
    ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= URL; ?>"><?= ucfirst(NAME); ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= session::get('username'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= URL; ?>webmaster/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?= URL; ?>webmaster/edit"><i class="fa fa-fw fa-edit"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= URL; ?>webmaster/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                    <li <?= ($active == 'index') ? 'class="active"' : '' ?>>
                        <a href="<?= URL; ?>webmaster/index"><i class="fa fa-fw fa-dashboard"></i> Index</a>
                    </li>
                    <li <?= ($active == 'posts' || $active == 'published')? 'class="active"' : '' ?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#_posts" <?= ($active == 'posts' || $active == 'posts')? 'aria-expanded="true"' : '' ?> >
                            <i class="fa fa-fw fa-file"></i> Posts <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="_posts" <?= ($active == 'posts' || $active == 'published')? 'aria-expanded="true" class="collapse in"' : 'class="collapse"' ?> >
                            <li <?= ($active == 'posts') ? 'class="active"' : '' ?>>
                                <a href="<?= URL; ?>webmaster/posts">All</a>
                            </li>
                            <li <?= ($active == 'published') ? 'class="active"' : '' ?>>
                                <a href="<?= URL; ?>webmaster/published">Published</a>
                            </li>
                            <li <?= ($active == 'create_post') ? 'class="active"' : '' ?>>
                                <a href="<?= URL; ?>webmaster/create">New Post</a>
                            </li>
                        </ul>
                    </li>
                    <li <?= ($active == 'comments' || $active == 'published_comment')? 'class="active"' : '' ?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#_comments" <?= ($active == 'posts' || $active == 'posts')? 'aria-expanded="true"' : '' ?> >
                            <i class="fa fa-fw fa-comments"></i> Comments <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="_comments" <?= ($active == 'comments' || $active == 'published_comment')? 'aria-expanded="true" class="collapse in"' : 'class="collapse"' ?> >
                            <li <?= ($active == 'comments;" ') ? 'class="active"' : '' ?>>
                                <a href="<?= URL; ?>webmaster/comments">All</a>
                            </li>
                            <li <?= ($active == 'published_comment') ? 'class="active"' : '' ?>>
                                <a href="<?= URL; ?>webmaster/published_comments">Published</a>
                            </li>
                        </ul>
                    </li>
                    <li <?= ($active == 'categories') ? 'class="active"' : '' ?>>
                        <a href="<?= URL; ?>webmaster/categories"><i class="fa fa-fw fa-filter"></i> Categories</a>
                    </li>
                    <li <?= ($active == 'tags') ? 'class="active"' : '' ?>>
                        <a href="<?= URL; ?>webmaster/tags"><i class="fa fa-fw fa-tags"></i> Tags</a>
                    </li>
                    <?php if($_SESSION['role'] == "owner"): ?>
                        <li <?= ($active == 'admins') ? 'class="active"' : '' ?>>
                            <a href="<?= URL; ?>webmaster/administrators"><i class="fa fa-fw fa-users"></i> Admin</a>
                        </li>
                    <?php endif; ?>
                    <li <?= ($active == '') ? 'class="active"' : '' ?>>
                        <a href="<?= URL; ?>webmaster/index"><i class="fa fa-fw fa-users"></i> Index</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <div id="page-wrapper">

            <div class="container-fluid">

                <?php $this->render('alert'); ?>