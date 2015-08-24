<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h1>
    Admin Login
</h1>

<a href="<?php echo Yii::app()->createUrl('main_admin'); ?>">
    <div class="btn btn-success"><i class="fa fa-user"></i> Admin Login</div>
</a>