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
        <h3 class="box-title"><?php echo $header; ?></h3>

    </div><!-- /.box-header -->
    <div class="box-body no-padding">

        <table class="table table-hover table-striped" id="mailbox">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($post as $rs): ?>
                    <tr>
                        <td class="mailbox-name">
                            <?php if ($rs['read_post'] == "1") { ?>
                                <a href="index.php?r=frontend/posts/detail_post&post_id=<?php echo $rs['post_id'] ?>&read_post=0">
                                    <i class="fa fa-star-o text-yellow"></i> <i class="fa fa-envelope-o text-yellow"></i>
                                    <?php echo $rs['title'] ?>
                                </a>
                            <?php } else { ?>
                                <a href="index.php?r=frontend/posts/detail_post&post_id=<?php echo $rs['post_id'] ?>&read_post=1">
                                    <i class="fa fa-star text-yellow"></i> <i class="fa fa-envelope text-yellow"></i>
                                    <?php echo $rs['title'] ?>
                                </a>
                            <?php } ?>
                        </td>
                        <td class="mailbox-subject"><?php echo $rs['detail'] ?></td>
                        <td class="mailbox-attachment"></td>
                        <td class="mailbox-date"><?php echo $rs['d_update'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table><!-- /.table -->

    </div><!-- /.box-body -->
    <div class="box-footer no-padding">

    </div>
</div><!-- /. box -->
