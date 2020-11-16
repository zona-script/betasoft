<?php

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
    //Request hash

}

function getCallbackUrl()
{
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
}

?>

<h3 align="center" style="color: #0d638f">Please Select your Preferred Gateway to pay online !</h3>
<div class="container">
    <?php echo $this->session->flashdata('site_flash') ?>
    <div class="row">
        Dear <?php echo $this->session->_user_name_ ?>,<br/>
        Please follow the below steps &rarr;
        <hr/>
        <div align="center"><i class="fa fa-expeditedssl" style="font-size: 100px"></i></div>
        <div class="panel-group" id="accordion">
            <?php
            if (config_item('enable_paypal') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                Pay With Paypal &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse in">
                        <div class="panel-body">The Easiest and safest way to pay online<br/>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="business" value="<?php echo config_item('paypal_email') ?>">
                                <input type="hidden" name="item_name"
                                       value="<?php echo $this->db_model->select('prod_name', 'product', array('id' => $this->session->_product_)); ?>">
                                <input type="hidden" name="item_number" value="<?php echo $this->session->_product_ ?>">
                                <input type="hidden" name="invoice" value="<?php echo $this->session->_inv_id_ ?>">
                                <input type="hidden" name="amount" value="<?php echo $this->session->_price_ ?>">
                                <input type="hidden" name="first_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                                <input type="hidden" name="address1" value="<?php echo $this->session->_address_ ?>">
                                <input type="hidden" name="night_phone_a" value="<?php echo $this->session->_phone_ ?>">
                                <input type="hidden" name="notify_url"
                                       value="<?php echo site_url('gateway/paypal_ipn/' . $this->session->_type_) ?>">
                                <input type="hidden" name="cancel_return"
                                       value="<?php echo site_url('gateway/status/paypal') ?>">
                                <input type="hidden" name="return"
                                       value="<?php echo site_url('gateway/status/paypal') ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency_code"
                                       value="<?php echo config_item('paypal_currency') ?>">
                                <input type="hidden" name="email" value="<?php echo $this->session->_email_ ?>">
                                <button class="btn btn-primary" type="submit">Pay with Paypal &rarr;</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            endif; ?>
            <?php
            if (config_item('enable_instamojo') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Debit Card/ Net Banking / Credit Card / Wallet - Instamojo &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse">
                        <div class="panel-body">
                            <a href="<?php echo site_url('gateway/instamojo_start') ?>" class="btn btn-danger">Pay Now
                                &rarr;</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            if (config_item('enable_block_io') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Bitcoin / Dogecoin / Litecoin - Block.io &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a href="<?php echo site_url('gateway/block_io_start') ?>" class="btn btn-danger">Pay Now
                                &rarr;</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (config_item('enable_coinpayments') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Cryptocurrency - coinpayments.io &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse">
                        <div class="panel-body">
                            <form action="https://www.coinpayments.net/index.php" method="post">
                                <input type="hidden" name="cmd" value="_pay">
                                <input type="hidden" name="reset" value="1">
                                <input type="hidden" name="merchant" value="<?php echo config_item('mrcnt_id') ?>">
                                <input type="hidden" name="item_name" value="Wallet Deposit">
                                <input type="hidden" name="first_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                                <input type="hidden" name="last_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                                <input type="text" class="form-control" required name="email" id="email"
                                       value=""/>
                                <input type="hidden" name="currency" value="<?php echo config_item('iso_currency') ?>">
                                <input type="hidden" name="amountf" value="<?php echo $this->session->_price_ ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="allow_quantity" value="0">
                                <input type="hidden" name="want_shipping" value="0">
                                <input type="hidden" name="success_url"
                                       value="<?php echo site_url('gateway/coinpayment_success') ?>">
                                <input type="hidden" name="cancel_url"
                                       value="<?php echo site_url('gateway/coinpayment_fail') ?>">
                                <input type="hidden" name="ipn_url"
                                       value="<?php echo site_url('gateway/coinpayment_ipn') ?>">
                                <input type="hidden" name="allow_extra" value="0">
                                <input type="image" src="https://www.coinpayments.net/images/pub/buynow-wide-blue.png"
                                       alt="Buy Now with CoinPayments.net">
                            </form>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (config_item('enable_payumoney') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                Debit Card/ Net Banking / Credit Card - PayuMoney &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse">
                        <div class="panel-body">
                            <form action="#" id="payment_form">
                                <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7"/>
                                <input type="hidden" name="key" id="key"
                                       value="<?php echo config_item('payumoney_key') ?>"/>
                                <input type="hidden" name="salt" id="salt" value="<?php echo config_item('payumoney_salt') ?>"/>
                                <input type="hidden" name="txnid" id="txnid" value="<?php echo $this->session->_user_id_ ?>"/>
                                <input name="amount" type="hidden" id="amount" value="<?php echo $this->session->_price_; ?>"/>

                                <input type="hidden" name="fname" id="fname"
                                       value="<?php echo $this->session->_user_name_; ?>"/>
                                <label>Enter your Email ID to Proceed</label>
                                <input type="text" required class="form-control" name="email" id="email"
                                       value=""/><br/>
                                <input type="hidden" name="mobile" id="mobile"
                                       value="<?php echo $this->session->_phone_; ?>"/>
                                <input name="pinfo" id="pinfo" type="hidden"
                                       value="Registration Product">
                                <input type="hidden" name="surl" id="surl"
                                       value="<?php echo site_url('gateway/status/payumoney') ?>"/>
                                <input type="hidden" name="furl" id="furl"
                                       value="<?php echo site_url('gateway/status/payumoney') ?>"/>
                                <div class="dv">
                                    <span><input type="hidden" id="hash" name="hash" placeholder="Hash" value=""/></span>
                                </div>


                                <div><input type="submit" class="btn btn-danger" style="min-width:200px" value="Pay" onclick="launchBOLT(); return false;"/></div>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#payment_form').bind('keyup blur', function () {
        $.ajax({
            url: '<?php echo site_url('gateway/hash') ?>',
            type: 'post',
            data: JSON.stringify({
                key: $('#key').val(),
                salt: $('#salt').val(),
                txnid: $('#txnid').val(),
                amount: $('#amount').val(),
                pinfo: $('#pinfo').val(),
                fname: $('#fname').val(),
                email: $('#email').val(),
                mobile: $('#mobile').val(),
                udf5: $('#udf5').val()
            }),
            contentType: "application/json",
            dataType: 'json',
            success: function (json) {
                if (json['error']) {
                    $('#alertinfo').html('<i class="fa fa-info-circle"></i>' + json['error']);
                } else if (json['success']) {
                    $('#hash').val(json['success']);
                }
            }
        });
    });

</script>
<script type="text/javascript">
    function launchBOLT() {
        bolt.launch({
            key: $('#key').val(),
            txnid: $('#txnid').val(),
            hash: $('#hash').val(),
            amount: $('#amount').val(),
            firstname: $('#fname').val(),
            email: $('#email').val(),
            phone: $('#mobile').val(),
            productinfo: $('#pinfo').val(),
            udf5: $('#udf5').val(),
            surl: $('#surl').val(),
            furl: $('#surl').val(),
            mode: 'dropout'
        }, {
            responseHandler: function (BOLT) {
                console.log(BOLT.response.txnStatus);
                if (BOLT.response.txnStatus != 'CANCEL') {
                    //Salt is passd here for demo purpose only. For practical use keep salt at server side only.
                    var fr = '<form action=\"' + $('#surl').val() + '\" method=\"post\">' +
                        '<input type=\"hidden\" name=\"key\" value=\"' + BOLT.response.key + '\" />' +
                        '<input type=\"hidden\" name=\"salt\" value=\"' + $('#salt').val() + '\" />' +
                        '<input type=\"hidden\" name=\"txnid\" value=\"' + BOLT.response.txnid + '\" />' +
                        '<input type=\"hidden\" name=\"amount\" value=\"' + BOLT.response.amount + '\" />' +
                        '<input type=\"hidden\" name=\"productinfo\" value=\"' + BOLT.response.productinfo + '\" />' +
                        '<input type=\"hidden\" name=\"firstname\" value=\"' + BOLT.response.firstname + '\" />' +
                        '<input type=\"hidden\" name=\"email\" value=\"' + BOLT.response.email + '\" />' +
                        '<input type=\"hidden\" name=\"udf5\" value=\"' + BOLT.response.udf5 + '\" />' +
                        '<input type=\"hidden\" name=\"mihpayid\" value=\"' + BOLT.response.mihpayid + '\" />' +
                        '<input type=\"hidden\" name=\"status\" value=\"' + BOLT.response.status + '\" />' +
                        '<input type=\"hidden\" name=\"hash\" value=\"' + BOLT.response.hash + '\" />' +
                        '</form>';
                    var form = jQuery(fr);
                    jQuery('body').append(form);
                    form.submit();
                }
            },
            catchException: function (BOLT) {
                alert(BOLT.message);
            }
        });
    }
</script>