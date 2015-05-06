

<select id="tambon_code" name="tambon_code" class="form-control">
    <?php foreach ($tambon as $tam) { ?>
        <option value="<?php echo $tam['id']; ?>"><?php echo $tam['tambon_name']; ?></option>
    <?php } ?>
</select>
