<?php

?>
<div class="row">
    <?php echo form_open() ?>
    <h4 align="center">Create New Category</h4>
    <hr/>
    <div class="form-group">
        <div class="col-sm-6">
            <label>Category Name*</label>
            <input type="text" class="form-control" name="cat_name">
        </div>
        <div class="col-sm-6">
            <label>Parent Category</label>
            <select class="form-control" name="parent_cat">
                <option value="" selected>No Parent</option>
                <?php foreach ($parents as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['cat_name'] . '</option>';
                } ?>
            </select>
        </div>
        <div>&nbsp;</div>
        <div class="col-sm-12">
            <label>Category Description</label>
            <textarea class="form-control" id="editor"
                      name="description"><?php echo set_value('description') ?></textarea>
        </div>
        <div class="col-sm-12"><br/>
            <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
        </div>

    </div>
    <?php echo form_close() ?>
</div>