
<div class="row table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>S.N.</td>
            <td>Name</td>
            <td>Join Date</td>
            <td>Total Downline</td>
            <td>Sponsor ID</td>
        </tr>
        </thead>
        <tbody>
        <?php $this->plan_model->ref_list($this->session->user_id) ?>
        </tbody>
    </table>
</div>
