<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $this->session->name ?> | <?php echo config_item('company_name') ?></title>
    <meta name="author" content="BaseRoot"/>

    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('axxets/member/theme.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/eggplant/jquery-ui.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('uploads/favicon.ico') ?>"/>
    
    <style>
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {background-color: unset !important;}

        .table tr th {color: unset !important;}
    </style>
</head>
<body>
<div id="wrapper">
    <div class="navbar-default sidebar">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"><span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand"
               href="<?php echo site_url('member') ?>"><?php echo config_item('company_name') ?></a></div>
        <div class="clearfix"></div>
        <div class="sidebar-nav navbar-collapse">

            <!-- user profile pic -->
            <div class="userprofile text-center">
                <a href="<?php echo site_url('member') ?>">
                <img src="<?php echo base_url('uploads/logo.png') ?>" alt="logo" class="img-responsive" style="max-width: 80%"></a>
            </div>
            <div class="clearfix"></div>
            <!-- user profile pic -->

            <ul class="nav" id="side-menu">
                <li><a href="<?php echo site_url('member') ?>"><i
                                class="fa fa-home"></i><span>Dashboard</span></a></li>
                <li>
                    <a href="<?php echo site_url('member/welcome-letter') ?>"><i
                                class="fa fa-file-text-o"></i><span> Welcome Letter</span></a>
                </li>
                <?php if (config_item('enable_help_plan') !== "Yes") { ?>
                    <li>
                        <a href="<?php echo site_url('member/my-invoices') ?>"><i
                                    class="fa fa-print"></i><span> My Invoices</span></a>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_epin') == "Yes") { ?>
                    <li>
                        <a href="javascript:void(0)" class="menudropdown"><i
                                    class="fa fa-xing-square"></i><span>My e-PINs</span><span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('member/unused-epin') ?>"><span>Un-Used e-PINs</span></a>
                            </li>
                            <li><a href="<?php echo site_url('member/used-epin') ?>"><span>Used e-PINs</span></a></li>
                            <li><a href="<?php echo site_url('member/transfer-epin') ?>"><span>Transfer e-PIN</span></a>
                            </li>
                            <li><a href="<?php echo site_url('member/generate-epin') ?>"><span>Generate e-PIN</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_help_plan') !== "Yes") { ?>
                    <li>
                        <a href="javascript:void(0)" class="menudropdown"><i
                                    class="fa fa-money"></i><span>My Earnings</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('member/view-earning') ?>"><span>My Earnings</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('member/search-earning') ?>"><span>Search Earnings</span></a>
                            <li><a href="<?php echo site_url('member/topup-wallet') ?>"><span>Top-up Wallet</span></a>
                            </li>
                            </li>
                            <?php if (config_item('enable_reward') == "Yes") { ?>
                                <li><a href="<?php echo site_url('member/my-rewards') ?>"><span>My Rewards</span></a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo site_url('wallet/transfer-balance') ?>"><span>Transfer Fund</span></a>
                            </li>
                            <?php if (config_item('user_withdraw') == "Yes") { ?>
                                <li>
                                    <a href="<?php echo site_url('wallet/withdraw-payouts') ?>"><span>Withdraw Payouts</span></a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo site_url('wallet/withdrawal-list') ?>"><span>Payout Report</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('wallet/balance-transfer-list') ?>"><span>Balance Transfer Report</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a href="javascript:void(0)" class="menudropdown"><i
                                class="fa fa-sitemap"></i><span>Tree & Downline</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('tree/genealogy') ?>"><span>My Genealogy</span></a></li>
                        <li><a href="<?php echo site_url('tree/my-tree') ?>"><span>My Downline Tree</span></a></li>
                        <li><a href="<?php echo site_url('tree/alldownline') ?>"><span>All Downline List</span></a>
                        <li><a href="<?php echo site_url('tree/directlist') ?>"><span>Direct Referrer List</span></a>
                        </li>
                        <li>
                            <a target="_blank"
                               href="<?php echo site_url('site/register/A/' . $this->session->user_id) ?>"><span>Add Member</span></a>
                        </li>
                    </ul>
                </li>
                <?php if (config_item('enable_help_plan') == "Yes") { ?>
                    <li>
                        <a href="javascript:void(0)" class="menudropdown"><i
                                    class="fa fa-gift"></i><span>My Donations</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('donation/sent-donation') ?>"><span>Sent History</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('donation/received-donation') ?>"><span>Received History</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_repurchase') == "Yes") { ?>
                    <li>
                        <a href="javascript:void(0)" class="menudropdown"><i
                                    class="fa fa-shopping-cart"></i><span>My Purchases</span><span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('cart/new-purchase') ?>"><span>New Purchase</span></a></li>
                            <li><a href="<?php echo site_url('cart/old-purchase') ?>"><span>Old Purchases</span></a>
                            </li>
                            <li><a href="<?php echo site_url('cart/pre-checkout') ?>"><span>My Cart</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_recharge') == "Yes") { ?>
                    <li>
                        <a href="javascript:void(0)" class="menudropdown"><i
                                    class="fa fa-mobile-phone"></i><span>Recharge Zone</span><span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('recharge/new-recharge') ?>"><span>New Recharge</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('recharge/old-recharges') ?>"><span>Old Recharges</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_coupon') == "Yes") { ?>
                    <li>
                        <a href="javascript:void(0)" class="menudropdown"><i
                                    class="fa fa-code"></i><span>My Coupons</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('coupon/unused') ?>"><span>Un Used Coupons</span></a></li>
                            <li><a href="<?php echo site_url('coupon/used') ?>"><span>Used Coupons</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_ad_incm') == "Yes") { ?>
                    <li>
                        <a href="javascript:void(0)" class="menudropdown"><i
                                    class="fa fa-bullhorn"></i><span>Advertisements</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('ads/myads') ?>"><span>My Ads</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_investment') == "Yes") { ?>
                    <li>
                        <a href="javascript:void(0)" class="menudropdown"><i
                                    class="fa fa-bitcoin"></i><span>My Investments</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('investments/new_invest') ?>"><span>New Investments</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('investments/recent_investment') ?>"><span>Recent Investments</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('investments/expired_investment') ?>"><span>Expired Investments</span></a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (config_item('enable_survey') == "Yes") { ?>

                    <li><a href="<?php echo site_url('survey/mysurveys') ?>"><i class="fa fa-list"></i>
                            <span>My Surveys</span></a>
                    </li>

                <?php } ?>
                <li>
                    <a href="javascript:void(0)" class="menudropdown"><i
                                class="fa fa-question"></i><span>My Support</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('ticket/new-ticket') ?>"><span>New Support Request</span></a>
                        </li>
                        <li><a href="<?php echo site_url('ticket/old-Supports') ?>"><span>List Tickets</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="menudropdown"><i class=" fa fa-cog"
                                                                         aria-hidden="true"></i><span>My Profile & Setting</span><span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('member/proile') ?>"><span>My Profile</span></a></li>
                        <li><a href="<?php echo site_url('member/settings') ?>"><span>Setting & Password</span></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url('member/logout') ?>"><i
                                class="fa fa-sign-out"></i> Log Out</a></li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->

    <div id="page-wrapper">
        <div class="row">
            <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
                <button class="menubtn pull-left btn "><i class="glyphicon  glyphicon-th"></i></button>

                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown"><a class="dropdown-toggle userdd" data-toggle="dropdown"
                                            href="javascript:void(0)">
                            <div class="userprofile small ">
                                <div class="textcontainer">
                                    <h3 class="username"><?php echo $this->session->name ?></h3>
                                </div>
                            </div>
                            <i class="caret"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="<?php echo site_url('member/settings') ?>"><i
                                            class="fa fa-cogs"></i> Settings</a>
                            </li>
                            <li><a href="<?php echo site_url('member/proile') ?>"><i
                                            class="fa fa-user"></i> Profile</a>
                            </li>
                            <li><a href="<?php echo site_url('member/logout') ?>"><i
                                            class="fa fa-sign-out"></i> Log Out</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

            </nav>
        </div>
        <div class="row">
            <div class="col-md-12  header-wrapper">
                <?php if (trim($layout) == "") { ?>
                    <h1 class="page-header"><?php echo $this->session->name ?></h1>
                    <p class="page-subtitle">Good Day ! Your ID
                        is: <?php echo config_item('ID_EXT') . $this->session->user_id ?>.</p>
                <?php } else {
                    echo '<h1 class="page-header">' . $title . '</h1>';
                } ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <ol class="breadcrumb">
            <li><a href="javascript:void(0)"><?php echo config_item('company_name') ?></a></li>
            <?php if (trim($layout) == "") { ?>
                <li class="active">Dashboard</li>
            <?php } else echo '<li class="active">' . $title . '</li>'; ?>
        </ol>
        <div class="panel panel-default" style="border-radius: 10px">
            <div style="padding: 30px;" class="panel-body">
                <div class="row">
                    <?php
                    echo validation_errors('<div class="alert alert-danger">', '</div>');
                    echo $this->session->flashdata('common_flash');
                    if (trim($layout) !== "") {
                        include_once $layout;
                    } else {
                    if (config_item('enable_help_plan') == "Yes"){
                        ?>
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-default-light panel-card border-default rounded">
                                    <div class="panel-heading bg-primary">
                                        <div class="panel-title">Total Help Sent:
                                        </div>
                                    </div><!-- /.panel-heading -->

                                    <div class="panel-body bg-primary">
                                        <div class="row">
                                            <div class="col-xs-12 col-item">
                                                <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                                        'status'    => 'Accepted',
                                                        'sender_id' => $this->session->user_id,
                                                    )) ?></strong>
                                            </div><!-- /.col-xs-6 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->
                            </div><!-- /.col-sm-6 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-default-light panel-card border-default rounded">
                                    <div class="panel-heading bg-warning">
                                        <div class="panel-title">Total Help Received:
                                        </div>
                                    </div><!-- /.panel-heading -->

                                    <div class="panel-body bg-warning">
                                        <div class="row">
                                            <div class="col-xs-12 col-item">
                                                <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                                        'status'      => 'Accepted',
                                                        'receiver_id' => $this->session->user_id,
                                                    )) ?></strong>
                                            </div><!-- /.col-xs-6 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->
                            </div><!-- /.col-sm-6 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-default-light panel-card border-default rounded">
                                    <div class="panel-heading bg-danger">
                                        <div class="panel-title">Total Pending Receivable
                                        </div>
                                    </div><!-- /.panel-heading -->

                                    <div class="panel-body bg-danger">
                                        <div class="row">
                                            <div class="col-xs-12 col-item">
                                                <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                                        'status'      => 'Sent',
                                                        'receiver_id' => $this->session->user_id,
                                                    )) ?></strong>
                                            </div><!-- /.col-xs-6 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->
                            </div><!-- /.col-sm-6 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-default-light panel-card border-default rounded">
                                    <div class="bg-success" style="background-color: #0cc745; color:#fff">
                                        <br/>
                                    </div><!-- /.panel-heading -->

                                    <div class="panel-body bg-success" style="background-color: #0cc745; color:#fff">
                                        <div class="row">
                                            <a href="<?php echo site_url('ticket/old-Supports') ?>" style="color:#fff !important;">
                                                <div class="col-xs-12 col-item blink">
                                                    <strong>Click Here</strong><br/>
                                                    <span>for Support</span>
                                                </div>
                                            </a>
                                            <!-- /.col-xs-6 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->
                            </div><!-- /.col-sm-6 -->
                        </div><!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6 table-responsive">
                                <h3>Please Send Donations to:</h3>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr style="font-weight: 900; background-color: #0d638f !important; color:#fff">
                                        <th>Receiver</th>
                                        <th>Bank Detail</th>
                                        <th>Phone No</th>
                                        <th>Amount</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $this->db->select('id,receiver_id, donation_amount')->from('donations')
                                             ->where(array(
                                                         'status'         => 'Sent',
                                                         'sender_id'      => $this->session->user_id,
                                                         'expiry_date >=' => date('Y-m-d'),
                                                     ))
                                             ->order_by('id', 'DESC')->limit(10);
                                    $no   = 1;
                                    $data = $this->db->get()->result();
                                    foreach ($data as $res) {
                                        $detail = $this->db_model->select_multi('id, name,phone', 'member', array('id' => $res->receiver_id));
                                        $bank   = $this->db_model->select_multi('bank_ac_no,bank_name,bank_ifsc', 'member_profile', array('userid' => $res->receiver_id));
                                        echo '<tr>
                                            <td><strong style="text-decoration: underline;">' . $detail->id . '</strong></br/>' . $detail->name . '<br/>' . $detail->phone . '</td>
                                            <td>Bank:' . $bank->bank_name . '<br/>A/C No:' . $bank->bank_ac_no . '<br/>IFSC: ' . $bank->bank_ifsc . '</td>
                                            <td>' . $this->db_model->select('phone', 'member', array('id' => $res->receiver_id)) . '</td>
                                            <td>' . config_item('currency') . $res->donation_amount . '</td>
                                            <td><a href="javascript:;" onclick="document.getElementById(\'id\').value=\'' . $res->id . '\'"
                                            data-toggle="modal"
                                            data-target="#myModal"
                                            class="btn btn-xs btn-primary">Send</a></td>
                                        </tr>';
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="col-sm-6 table-responsive">
                                <h3>Confirm Donations:</h3>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr style="font-weight: 900; background-color: #ff4848 !important; color:#fff">
                                        <th>Sender</th>
                                        <th>Phone No</th>
                                        <th>Amount</th>
                                        <th>Transaction Detail</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $this->db->select('id,sender_id, donation_amount, trid, file,status')->from('donations')
                                             ->where(array(
                                                         'status !='   => 'Accepted',
                                                         'receiver_id' => $this->session->user_id,
                                                     ))
                                             ->order_by('id', 'DESC')->limit(10);
                                    $no   = 1;
                                    $data = $this->db->get()->result();
                                    foreach ($data

                                             as $res) {

                                        $detail = $this->db_model->select_multi('name,phone', 'member', array('id' => $res->sender_id));
                                        if ($res->file !== "") {
                                            $file_line = '<br/><a target="_blank" class="btn btn-xs btn-primary" href="' . base_url('uploads/' . $res->file) . '">See Receipt</a>';
                                        }
                                        echo '<tr>
                                            <td><strong style="text-decoration: underline;">' . $detail->id . '</strong></br/>' . $detail->name . '<br/>' . $detail->phone . '</td>
                                            <td>' . $this->db_model->select('phone', 'member', array('id' => $res->sender_id)) . '</td>
                                            <td>' . config_item('currency') . $res->donation_amount . '</td>
                                            <td>';
                                        if ($res->status !== 'Waiting') {
                                            echo '<td colspan="2">Waiting to Send Payment</td>';
                                        } else {
                                            echo ' ' . $res->trid . '
                                            ' . $file_line . '</td>
                                            <td><a href="donation/approve-donation/' . $res->id . '" onclick="return confirm(\'Are you sure, you have received this payment and want to confirm ?\')"
                                            class="btn btn-xs btn-success">Accept
                                            </a></td>';
                                        }
                                        echo '</tr>';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div><!-- /.row -->

                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Send Donation</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <?php echo form_open_multipart('donation/send-donation') ?>
                                            <input type="hidden" name="id" id="id" value="">
                                            <label>Enter Transaction Detail (Optional)</label><br/>
                                            <textarea name="tdetail" class="form-control"></textarea><br/>
                                            <input name="files" type="file"> Upload Receipt<br/>
                                            <button class="btn btn-primary">Submit</button>
                                            <?php echo form_close() ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else{ ?>
                    <?php if (config_item('is_demo') == TRUE) {
                        echo '<div class="alert alert-danger">This Website/Software will expire soon, Please clear due balance !<br/> इस बैनर को हटाने के
 लिए कृपया अपनी शेष राशि का भुगतान करें !</div>';
                    } ?>

                    <div class="alert alert-success" align="center"><strong>Rank : <?php echo $this->db_model->select('rank', 'member', array('id' => $this->session->user_id)); ?></strong></div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="panel panel-blue shadow2 padding">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo base_url('uploads/site_img/downline.png') ?>" alt=""
                                                 style="height: 90px; width: auto">
                                        </div>
                                        <div class="col-xs-8 text-right" style="padding: 10px">
                                            <div class="huge"><?php echo $detail->total_a + $detail->total_b + $detail->total_c + $detail->total_d + $detail->total_e ?>
                                            </div>
                                            <div>Total&nbsp;Member</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="panel panel-green shadow2 padding">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo base_url('uploads/site_img/referred.png') ?>" alt=""
                                                 style="height: 90px; width: auto">
                                        </div>
                                        <div class="col-xs-8 text-right" style="padding: 10px">
                                            <div class="huge"><?php echo $this->db_model->count_all('member', array('sponsor' => $this->session->user_id));
                                                ?>
                                            </div>
                                            <div>Total&nbsp;Directs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="panel panel-red shadow2 padding">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo base_url('uploads/site_img/earning.png') ?>" alt=""
                                                 style="height: 90px; width: auto">
                                        </div>
                                        <div class="col-xs-8 text-right" style="padding: 10px">
                                            <div class="huge"><?php $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id));
                                                if ($data <= "0") {
                                                    echo config_item('currency') . '0';
                                                } else {
                                                    echo config_item('currency') . $data;
                                                } ?>
                                            </div>
                                            <div>Total&nbsp;Earned</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="panel panel-yellow shadow2 padding">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo base_url('uploads/site_img/wallet.png') ?>" alt=""
                                                 style="height: 90px; width: auto">
                                        </div>
                                        <div class="col-xs-8 text-right" style="padding: 10px">
                                            <div class="huge"><?php echo config_item('currency') . $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id)); ?>
                                            </div>
                                            <div>Wallet</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="panel panel-yellow shadow2 padding" style="background-color: #817cce">
                                <div class="panel-heading" style="background-color: #817cce">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo base_url('uploads/site_img/withdraw.png') ?>" alt=""
                                                 style="height: 80px; width: auto">
                                        </div>
                                        <div class="col-xs-8 text-right" style="padding: 10px">
                                            <div class="huge"><?php $data = $this->db_model->sum('amount', 'withdraw_request', array(
                                                    'userid' => $this->session->user_id,
                                                    'status' => 'Paid',
                                                ));
                                                if ($data == "") {
                                                    echo config_item('currency') . '0';
                                                } else {
                                                    echo config_item('currency') . $data;
                                                }
                                                ?>
                                            </div>
                                            <div>Withdrawals</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="panel panel-yellow shadow2 padding" style="background-color: chocolate">
                                <div class="panel-heading" style="background-color: chocolate">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo base_url('uploads/site_img/sitemap.png') ?>" alt=""
                                                 style="height: 90px; width: auto">
                                        </div>
                                        <div class="col-xs-8 text-right" style="padding: 10px">
                                            <a href="<?php echo site_url('tree/my-tree') ?>"
                                               class="btn btn-outline btn-xs">Click
                                                Here
                                                &rarr;</a>
                                            <div>My Tree</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="panel panel-yellow shadow2 padding">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo base_url('uploads/site_img/icon-phone.png') ?>" alt=""
                                                 style="height: 90px; width: auto">
                                        </div>
                                        <div class="col-xs-8 text-right" style="padding: 10px; padding-left: 0px">
                                            <a href="<?php echo site_url('ticket/new-ticket') ?>"
                                               class="btn btn-outline btn-xs">Click
                                                Here
                                                &rarr;</a>
                                            <div>Support</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="panel panel-yellow shadow2 padding" style="background-color: chocolate">
                                <div class="panel-heading" style="background-color: chocolate">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="<?php echo base_url('uploads/site_img/investment.png') ?>" alt=""
                                                 style="height: 90px; width: auto">
                                        </div>
                                        <div class="col-xs-8 text-right" style="padding: 10px">
                                            <a href="<?php echo site_url('wallet/withdraw-payouts') ?>"
                                               class="btn btn-outline btn-xs">Click
                                                Here
                                                &rarr;</a>
                                            <div>Withdraw</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">Latest Earnings</div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Income Name</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            $sn = 1;
                                            $this->db->select('type, amount, date')
                                                     ->where('userid', $this->session->user_id)->order_by('id', 'DESC')
                                                     ->limit(6);
                                            $inc = $this->db->get('earning')->result();

                                            ?>
                                            <tbody>
                                            <?php foreach ($inc as $e): ?>
                                                <tr>
                                                    <td><?php echo $sn++ ?></td>
                                                    <td><?php echo $e->type ?></td>
                                                    <td><?php echo config_item('currency') . $e->amount ?></td>
                                                    <td><?php echo $e->date ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <br/>
                                    </div>
                                    <a href="<?php echo site_url('member/view-earning') ?>"
                                       class="btn btn-xs btn-primary pull-right">View More
                                        &rarr;</a>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading"> My referral Link</div>
                                <div class="panel-body">
                                    <p><a target="_blank"
                                          href="<?php echo site_url() . 'site/register/A/' . $this->session->user_id ?>"><?php echo site_url() . 'site/register/A/' . $this->session->user_id ?></a>
                                    </p>
                                </div>
                                <div class="panel-footer"><a
                                            href="https://www.facebook.com/sharer.php?u=<?php echo site_url() . 'site/register/A/' . $this->session->user_id ?>"
                                            target="_blank" class="btn btn-xs btn-primary fa fa-facebook"
                                            style="padding-top: 3px !important; background-color: #0d638f; text-transform: capitalize">
                                        Share</a></div>
                            </div>
                            <?php
                            if (config_item('enable_topup') == "Yes" && $this->db_model->select('topup', 'member', array('id' => $this->session->user_id)) <= '0') {
                                ?>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">Topup Your Account</div>
                                    <?php echo form_open('member/topup') ?>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="product" class="control-label">Sign Up Product</label>
                                            <select class="form-control" id="product" name="product">
                                                <?php foreach ($products as $val) {
                                                    echo '<option value="' . $val['id'] . '">' . $val['prod_name'] . '. Price :' . config_item('currency') . number_format($val['prod_price'] + ($val['prod_price'] * $val['gst'] / 100), 2) . ' </option>';
                                                } ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter TopUp e-PIN</label>
                                            <input class="form-control" type="text"
                                                   name="topup">
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <button type="submit"
                                                class="btn btn-success">Submit
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_close();
                            } ?>
                        </div>
                    </div>
                </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.0/autosize.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<!-- endinject -->
<script src="<?php echo base_url('axxets/member/theme.js') ?>"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({html: true, placement: "top"});
    });
</script>
<script>
    $(function () {
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            yearRange: "-70:+70",
            changeMonth: true,
            changeYear: true,
            defaultDate: 0,
            showOptions: {direction: "down"},
        });
    });
</script>
</body>
</html>
