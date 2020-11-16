<?php
$top_id = $this->session->user_id;
$this->db->select('id, transfer_from, transfer_to, amount, time')->from('transfer_balance_records')
         ->where('transfer_to', htmlentities($top_id))->or_where('transfer_from', htmlentities($top_id));
$data = $this->db->get()->result();
?>

<div class="col-sm-12 table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>S.N.</td>
            <td>Transferred From</td>
            <td>Transferred To</td>
            <td>Amount</td>
            <td>Date</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($data as $e) {

            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->transfer_from ?></td>
                <td><?php echo $e->transfer_to ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->time ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
