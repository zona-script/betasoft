<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo config_item('company_name') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <!-- css -->
    <link href="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url('axxets/site/default/css/style.css') ?>" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet"
          type="text/css"/>

    <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body id="top">
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TAGCODE"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<div class="page_loader"></div>
<div class="login-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-section">
                    <div class="logo-2">
                        <a href=""><img src="<?php echo base_url('uploads/logo.png') ?>"
                                        style="max-height: 50px" alt="logo"/></a>
                    </div>
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
                    <?php echo $this->session->flashdata('site_flash') ?>
                    <?php if (config_item('is_demo') == TRUE) {
                        echo '<div class="alert alert-danger">Please Pay your remaining balance to remove this banner !<br/> इस बैनर को हटाने के
 लिए कृपया अपनी शेष राशि का भुगतान करें !</div>';
                    } ?>
                    <?php if (trim($layout) == "") { ?>
                        <h3>Sign into your account</h3>
                        <?php echo form_open(site_url('site/login')) ?>
                        <div class="form-group form-box">
                            <input type="text" name="username" class="input-text" placeholder="User ID">
                        </div>
                        <div class="form-group form-box">
                            <input type="password" name="password" class="input-text" placeholder="Password">
                        </div>
                        <div class="form-group mb-0 clearfix">
                            <button type="submit" class="btn-md btn-theme float-left">Login</button>
                            <a href="<?php echo site_url('site/forgotpw') ?>" class="forgot-password">Forgot
                                Password</a>
                        </div>
                        <div class="extra-login clearfix">
                            <span>Or</span>
                        </div>
                        <div class="clearfix"></div>
                        <p><a href="<?php echo site_url('site/franchisee') ?>" class="thembo"> Franchisee Login
                                &rarr;</a></p>
                        </form>
                        <p class="text-info" style="margin-top: 20px">Don't have an account? <a
                                    href="<?php echo site_url('site/register') ?>" class="thembo"> Register here</a></p>
                    <?php } else {
                        include_once(APPPATH . "views/theme/" . $layout);
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<script src="<?php echo base_url('axxets/site/default/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('axxets/site/default/js/bootstrap.min.js') ?>"></script>
</body>
</html>
