<script type="text/javascript">
    $(document).ready(function () {
        $("#mailbox").dataTable({
            bFilter: false,
            bInfo: false,
            bSort: false,
            iDisplayLength: 10,
            bLengthChange: false
        });
    });
</script>



<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <?php
            echo $header;
            ?>
        </h3>

    </div><!-- /.box-header -->
    <div class="box-body no-padding">

        <table class="table table-hover table-striped" id="mailbox">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lib = new Lib();
                foreach ($post as $rs):
                    ?>
                    <tr>
                        <td class="mailbox-name">
                            <?php if ($rs['read_post'] == "1") { ?>
                                <a href="index.php?r=frontend/posts/detail_post&post_id=<?php echo $rs['post_id'] ?>&read_post=0&status=<?php echo $status; ?>">
                                    <i class="fa fa-star-o text-yellow"></i> <i class="fa fa-envelope-o text-yellow"></i>
                                    <?php echo $rs['title'] ?>
                                    <?php
                                    if (empty($rs['title'])) {
                                        echo "<em>ข้อความตอบกลับ</em>";
                                    }
                                    ?>
                                </a>

                            <?php } else { ?>
                                <a href="index.php?r=frontend/posts/detail_post&post_id=<?php echo $rs['post_id'] ?>&read_post=1&status=<?php echo $status; ?>">
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-envelope text-yellow"></i>
                                    <?php echo $rs['title'] ?>
                                    <?php
                                    if (empty($rs['title'])) {
                                        echo "<em>ข้อความตอบกลับ</em>";
                                    }
                                    ?>
                                </a>
                            <?php } ?>
                        </td>
                        <td class="mailbox-date" style="text-align: right;">
                            <label>โดย </label> <i class="fa fa-user"></i><?php echo $rs['name'] . ' ' . $rs['lname']; ?> 
                            <label>วันที่</label> <i class="fa fa-clock-o"></i><?php echo $lib->thaidate($rs['d_update']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table><!-- /.table -->

    </div><!-- /.box-body -->
    <div class="box-footer no-padding">

    </div>
</div><!-- /. box -->
