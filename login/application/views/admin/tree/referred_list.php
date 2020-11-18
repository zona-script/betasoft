<?php
$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : config_item('top_id');

?>
<div class="row col-md-offset-2">
    <div class="col-sm-5">
        <form method="post" action="<?php echo site_url('tree/referred-list') ?>">
            <label>Enter User Id</label>
            <input type="text" name="top_id" class="form-control">
            <button class="btn btn-xs btn-danger" type="submit">Search</button>
        </form>
    </div>
    <hr/>
</div>
<div class="row table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>S.N.</td>
            <td>Name</td>
            <td>Join Date</td>
            <td>Total Downline</td>
            <td>Sponsor</td>
        </tr>
        </thead>
        <tbody>
        <?php $this->plan_model->ref_list($top_id) ?>
        </tbody>
    </table>
</div>
