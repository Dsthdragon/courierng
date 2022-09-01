<?php $general = new general_model(); ?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Statistics Overview</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= count($this->posts) ?></div>
                        <div>Total Posts</div>
                    </div>
                </div>
            </div>
            <a href="<?= URL ?>webadmin/posts">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"></div>
                        <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="<?= URL ?>webadmin/comments">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-filter fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= count($this->categories) ?></div>
                        <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="<?= URL ?>webadmin/categories">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= count($this->tags) ?></div>
                        <div>Tags</div>
                    </div>
                </div>
            </div>
            <a href="<?= URL ?>/webadmin/tags">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->

<!-- /.row -->

<div class="row">
    <div class="col-lg-4">
    <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Drafts - <?= count($this->drafts); ?></h3>
            </div>
            <div class="panel-body">
                <div>
                    <?php
                    $drafts = paginator::paginate($this->drafts, 10, 1);
                    $drafts = $drafts[0];
                    ?>
                    <ul>
                        <?php foreach($drafts as $key => $value): ?>
                            <?php 
                            $created_by = $general->getAdmin($value['created_by']);
                            ?>
                            <li>
                                <?= $value['title']; ?> by <?= $created_by['username'] ?><br />
                                <?= relative_time::justdate($value['created_at']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
            <div class="panel-footer text-right">
                <a href="<?= URL; ?>webmaster/posts" class="btn btn-link">more</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Support Updates</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">

                </div>
                <div class="text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
            </div>
            <div class="panel-body">
            </div>
        </div>
    </div>
</div>
<!-- /.row -->