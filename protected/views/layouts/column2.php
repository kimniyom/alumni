<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/backend'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Operations',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'breadcrumb'),
            ));
            $this->endWidget();
            ?>
        </h1>
    </div>
    <div class="panel-body"><?php echo $content; ?></div>
</div>

<div class="span-5 last">
    <div id="sidebar">

    </div><!-- sidebar -->
</div>


<div class="span-19">
    <div id="content">

    </div><!-- content -->
</div>

<?php $this->endContent(); ?>