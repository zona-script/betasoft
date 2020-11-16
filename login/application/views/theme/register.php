<?php if (config_item('disable_registration') !== "Yes") { ?>
    <?php echo form_open('site/register', array('id' => 'form')) ?>
    <h3>Create a New Acount</h3>
    <div class="form-group form-box">
        <input type="text" class="input-text"
               required="required" id="name" name="name" value="<?php echo set_value('name') ?>"
               placeholder="Name">
    </div>
    <div class="form-group form-box">
        <input type="text" onchange="get_user_name('#sponsor', '#spn_res')" class="input-text"
               value="<?php if ($this->uri->segment(3) !== "epin") {
                   $uri4 = $this->uri->segment(4);
               };
               echo set_value('sponsor', $uri4) ?>"
               id="sponsor"
               required="required"
               name="sponsor" placeholder="Sponsor ID">
        <span id="spn_res" style="color: red; font-weight: bold"></span>
    </div>
    <div class="form-group form-box">
        <input type="email" class="input-text" value="<?php echo set_value('email') ?>" id="email"
               name="email"
               placeholder="Email ID">
    </div>
    <div class="form-group form-box">
        <input type="text" class="input-text" value="<?php echo set_value('phone') ?>" id="phone" required="required"
               name="phone"
               placeholder="Phone No">
    </div>
    <div class="form-group form-box" style="text-align: left">
        <?php if (config_item('leg') !== "1" && config_item('show_placement_id') == "Yes" && config_item('autopool_registration') == "No") {
            ?>
            <label><span
                        id="psn_res"
                        style="color: red; font-weight: bold"></span></label>
            <input type="text" class="input-text" onchange="get_user_name('#position', '#psn_res')"
                   id="position" value="<?php echo set_value('position') ?>"
                   name="position" id="position" placeholder="Placement ID">
            <?php
        } ?>
    </div>
    <?php
    if (config_item('leg') == "1") {
        echo form_hidden('leg', 'A');
    } else {
        if (config_item('show_leg_choose') == "Yes" && config_item('autopool_registration') == "No") {
            ?>
            <div class="form-group form-box">
                <select class="input-text form-control" id="leg" name="leg">
                    <?php if (trim($this->uri->segment(3)) !== "" && trim($this->uri->segment(3)) !== "epin") {
                        echo '<option selected>' . $this->uri->segment(3) . '</option>';
                    } ?>
                    <?php foreach ($leg as $key => $val) {
                        echo '<option value="' . $key . '">' . $val . ' </option>';
                    } ?>
                </select>
            </div>
        <?php }
    }
    if (config_item('show_join_product') == "Yes") {
        ?>
        <div class="form-group form-box">
            <select class="input-text form-control" id="product" name="product">
                <?php foreach ($products as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['prod_name'] . '. Price :' . config_item('currency') . number_format($val['prod_price'] + ($val['prod_price'] * $val['gst'] / 100), 2) . ' </option>';
                } ?>

            </select>
        </div>
    <?php } ?>
    <?php if (config_item('enable_epin') == "Yes" && config_item('free_registration') == "No") {
        ?>
        <div class="form-group form-box" id="e_pin">
            <input type="text" value="<?php if (trim($this->uri->segment(3)) == "epin") {
                echo set_value('epin', $this->uri->segment(4));
            } ?>" class="input-text" id="epin" placeholder="E-Pin"
                   name="epin">
        </div>
    <?php } ?>
    <?php if (config_item('show_join_product') == "No" && config_item('free_registration') == "No") {
        ?>
        <div class="form-group form-box" id="amt_to_pay">
            <input type="text" required value="<?php echo set_value('amt_to_pay') ?>" class="input-text"
                   id="amt_to_pay"
                   placeholder="Amount You Want to Pay ?"
                   name="amt_to_pay">
        </div>
    <?php } ?>
    <?php if (config_item('enable_pg') == "Yes" && config_item('free_registration') == "No") {
        ?>
        <div class="form-group form-box">
            <label for="epin" class="control-label" style="color: #3a80d7">Payment Gateway</label><br/>
            <input type="checkbox" value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')"> I'll Pay
            Using
            Payment
            Gateway.
        </div>
        <?php
    }
    ?>
    <div class="form-group form-box">
        <input type="text" class="input-text" value="<?php echo set_value('address_1') ?>" id="address_1"
               placeholder="Address*"
               required="required"
               name="address_1">
    </div>
    <div class="form-group form-box">
        <input type="password" class="input-text" value="<?php echo set_value('password') ?>" id="password"
               placeholder="Password"
               required="required"
               name="password">
    </div>
    <div class="form-group form-box">
        <input type="password" class="input-text" value="<?php echo set_value('password_2') ?>"
               id="password_2"
               required="required"
               placeholder="Retype Password"
               name="password_2">
    </div>
    <div class="form-group mb-0 clearfix">
        <button type="submit" class="btn-md btn-theme btn-block" onclick="show()">Register</button>
    </div>
    <div id="load" style="display:none !important;" align="center">
        <img src="<?php echo site_url('uploads/load.gif') ?>">
        <h3 style="color:lightseagreen">Registering...</h3>
    </div>
    <div class="extra-login clearfix">
        <span>Or</span>
    </div>
    <div class="clearfix"></div>
    </form>
    <p class="text-info" style="margin-top: 20px">Want to Login? <a
                href="<?php echo site_url('site/login') ?>" class="thembo" style="text-decoration: underline"> Login here</a></p>

    <script type="text/javascript">
        function toogle_div(id1, id2) {
            if ($(id2).prop("checked") == true) {
                $(id1).hide('slow');
            } else {
                $(id1).show('slow');
            }
        }

        function show() {
            if ($('#phone').val() !== '' && $('#name').val() !== '' && $('#sponsor').val() !== '' && $('#address').val() !== '' && $('#password').val() !== '' && $('#password_2').val() !== '') {
                $('#form').hide('slow');
                $('#load').show('slow');
            }
        }

        function get_user_name(id, result) {
            var id = $(id).val();
            $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
                $(result).html(data);
            });
        }
    </script>
    <?php echo form_close();
} else {
    echo "<h3 align='center' style='margin: 10%'> Registration is disabled for maintenance. Please come later.</h3>";
} ?>