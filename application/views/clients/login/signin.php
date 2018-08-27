<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="">
                    <!-- <img class="align-content" src="<?php echo base_url('assets/imgs/logo.png'); ?>" alt=""> -->
                    <h1><?php echo APP_NAME; ?></h1>
                </a>
            </div>
            <div class="alert alert-danger animated bounceIn <?php echo isset($errors) ? '' : 'display-hide'; ?>" role="alert">
                <?php echo isset($errors) ? $errors['login'][0] : ''; ?>
            </div>
            <div class="login-form">
                <?php echo form_open('login/signin', 'class="" id="myform"'); ?>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="txt_email" id="txt_email"" placeholder="Email" value="<?php echo isset($values) ? $values['email'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txt_pwd" id="txt_pwd" placeholder="Password" value="<?php echo isset($values) ? $values['password'] : ''; ?>">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="chk_remember" id="chk_remember" <?php echo (isset($values) && $values['remember_me'] == 'on') ? 'checked' : ''; ?> > Remember Me
                        </label>
                        <label class="pull-right">
                            <a href="#">Forgotten Password?</a>
                        </label>

                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    <div class="register-link m-t-15 text-center">
                        <p>Don't have account ? <a href="<?php echo site_url('login/signup'); ?>"> Sign Up Here</a></p>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
    
<script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function($) {
        setTimeout(function() {
            $('.alert').hide();
        }, 3000);
    });
</script>