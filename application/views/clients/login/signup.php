<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="">
                    <!-- <img class="align-content" src="images/logo.png" alt=""> -->
                    <h1><?php echo APP_NAME; ?></h1>
                </a>
            </div>
            <div class="alert alert-danger animated bounceIn <?php echo isset($errors) ? '' : 'display-hide'; ?>" role="alert">
                <?php echo isset($errors) ? $errors['login'][0] : ''; ?>
            </div>
            <div class="login-form">
                <?php echo form_open('login/signup', 'class="" id="myform"'); ?>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="txt_email" id="txt_email"" placeholder="Email" value="<?php echo isset($values) ? $values['email'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="txt_username" id="txt_username" value="<?php echo isset($values) ? $values['username'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txt_pwd" id="txt_pwd" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="txt_pwd_confirm" id="txt_pwd_confirm" placeholder="Password" >
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Agree the terms and policy
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                    <div class="register-link m-t-15 text-center">
                        <p>Already have account ? <a href="<?php echo site_url('login/signin'); ?>"> Sign in</a></p>
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
            //$('.alert').hide();
        }, 3000);
    });
</script>