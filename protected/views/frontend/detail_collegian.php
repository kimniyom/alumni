<?php $lib = new Lib();?>
<p class="list-group-item">รหัสนักศึกษา : <?php echo $detail['collegian_code'];?></p>
<p class="list-group-item">วันเกิด : <?php echo $lib->thaidate($detail['collegian_birth']);?></p>
<p class="list-group-item">อายุ : <?php echo $lib->get_age($detail['collegian_birth']);?> ปี</p>
<p class="list-group-item">เบอร์โทรศัพท์ : <?php echo $detail['collegian_tel'];?></p>
<p class="list-group-item">อีเมลล์ : <?php echo $detail['collegian_email'];?></p>
<p class="list-group-item">อาชีพ : <?php if(isset($detail['occupation'])){ echo $detail['occupation']; } else{ echo "-"; }?></p>

