<nav class="collapse navbar-collapse" role="navigation">
    <ul class="nav navbar-nav">
        <li>
            <a href="index.php?r=site"><b><i class="fa fa-home"></i> หน้าเว็บ</b></a>
        </li>
        <li style="padding: 0px;">
            <a href="#stories"><i class="glyphicon glyphicon-comment"></i> ข้อความจากผู้ดูแลระบบ <span class="badge">10</span></a>
        </li>
        <li>
            <a href="#"><i class="glyphicon glyphicon-user"></i> ข้อความจากนักศึกษา <span class="badge">10</span></a>
        </li>
        <li>
            <a href="#"><i class="glyphicon glyphicon-envelope"></i> ข้อความจากตัวแทนบริษัท <span class="badge">10</span></a>
        </li>
        <li><a href="#"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>

            <ul class="dropdown-menu">

                <li>
                    <a href="<?php echo Yii::app()->createUrl('frontend/collegian/edit_password&collegian_code=' . Yii::app()->session['collegian_code']) ?>">
                        <i class="fa fa-key"></i> เปลี่ยนรหัสผ่าน</a>
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('site/logout') ?>">
                        <i class="fa fa-power-off"></i> ออกจากระบบ</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
