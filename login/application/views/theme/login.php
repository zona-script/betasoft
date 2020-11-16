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
            href="<?php echo site_url('site/register') ?>" class="thembo" style="text-decoration: underline"> Register here</a></p>