
<script type="text/javascript">
    $(document).ready(function () {
        $("#collegian").DataTable({
            "sPaginationType": "full_numbers", // แสดงตัวแบ่งหน้า
            "bLengthChange": true, // แสดงจำนวน record ที่จะแสดงในตาราง
            "iDisplayLength": 10, // กำหนดค่า default ของจำนวน record 
            "bFilter": true, // แสดง search box
            "oLanguage": {
                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                "sSearch": "ค้นหา :",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sLast": "หน้าสุดท้าย",
                    "sNext": "ถัดไป",
                    "sPrevious": "กลับ"
                }
            }
        });
    });
</script>

<div class="panel panel-danger">
    <div class="panel-heading">
        Datatable
    </div>
    <div class="panel-body">
        <table class="table table-bordered" id="collegian">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>lname</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($collegian as $rs): ?>
                    <tr>
                        <td><?php echo $rs['collegian_code']; ?></td>
                        <td><?php echo $rs['collegian_name']; ?></td>
                        <td><?php echo $rs['collegian_lname']; ?></td>
                        <td><?php echo $rs['collegian_email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


