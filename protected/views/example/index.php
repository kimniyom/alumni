<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $header; ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $provider,
            'columns' => array(
                'id',
                'menu_name',
                'menu_url', //ค่าในฐานข้อมูลถ้า จะเอาชื่อ ฟิวส์ มาแสดง
                array(// display 'author.username' using an expression
                    'name' => 'url',
                    'value' => '$data[\'menu_name\']', //วิธีเอาค่ามาแสดง จาก Provider
                    'type' => 'raw',
                    'htmlOptions' => array(
                        'style' => 'text-align:right;'
                    ),
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update}',
                    'header' => 'Action',
                    'buttons' => array(
                        'update' => array(
                            'url' => 'Yii::app()->createUrl(\'order/update\', array(\'id\'=>$data[\'id\']))',
                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>
