<nav class="collapse navbar-collapse" role="navigation">
    <ul class="nav navbar-nav">
        <li>
            <a href="index.php?r=site"><b><i class="fa fa-home"></i> หน้าแรก</b></a>
        </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo Yii::app()->createUrl('site/logout') ?>">
                        <i class="fa fa-power-off"></i> ออกจากระบบ</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>