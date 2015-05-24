<nav class="collapse navbar-collapse" role="navigation">
    <ul class="nav navbar-nav">
        <li>
            <a href="index.php?r=site"><b><i class="fa fa-home"></i> หน้าเว็บ</b></a>
        </li>
        <li style="padding: 0px;">
            <a href="#stories"><i class="glyphicon glyphicon-comment"></i> ข้อความจากตัวแทนบริษัท <span class="badge">10</span></a>
        </li>
        <li>
            <a href="#"><i class="glyphicon glyphicon-user"></i> ข้อความจากนักศึกษา <span class="badge">10</span></a>
        </li>
        <li>
            <a href="index.php?r=masmenu"><i class="glyphicon glyphicon-cog"></i> กลับหน้าจัดการข้อมูล </a>
        </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="<?php echo Yii::app()->createUrl('site/logout') ?>">
                <i class="fa fa-power-off"></i> ออกจากระบบ</a>
        </li>
    </ul>
</nav>