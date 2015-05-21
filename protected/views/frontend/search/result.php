<table class="table table-hover">
    <thead>
        <tr>
            <th colspan="2">รายชื่อ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $lib = new Lib();
        foreach ($result as $rs):
            ?>
            <tr>
                <td>

                </td>
                <td>
                    <?php echo $rs['shot_name'] . $rs['collegian_name'] . ' ' . $rs['collegian_lname']; ?><br/>
                    อายุ 
                    <?php
                    if (!empty($rs['collegian_birth'])) {
                        echo $rs['age'];
                    } else {
                        echo "-";
                    }
                    ?>
                    <br/>
                    อัพเดทข้อมูลเมื่อ <?php echo $lib->thaidate($rs['d_update']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

