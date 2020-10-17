<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php linkCss("css/normalize.css") ?>
    <?php linkCss("css/main.css") ?>
    <?php linkCss("css/bootstrap.min.css") ?>
    <?php linkCss("css/all.min.css") ?>
    <?php linkCss("fonts/flaticon.css") ?>
    <?php linkCss("css/animate.min.css") ?>
    <?php linkCss("style.css") ?>
    <?php linkJquery("js/modernizr-3.6.0.min.js") ?>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <img src="<?php echo BASEURL.'/assets/img/logo_3.png' ?>" alt="logo">
                </div>
                <form action="<?php echo BASEURL; ?>/credential/loginForm" method="POST" class="login-form">
                    <div class="form-group">
                        <label>Username <em class="arerror"><?php if(!empty($data['erroruid'])): echo $data['erroruid'] ;endif; ?></em></label>
                        <input type="text" name="uid" value="<?php if(empty($data['erroruid']) && !empty($data['uid'])): echo $data['uid'] ;endif; ?>" placeholder="Enter usrename" class="form-control">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password <em class="arerror"><?php if(!empty($data['errorpassword'])): echo $data['errorpassword'] ;endif; ?></em></label>
                        <input type="password" name="password" placeholder="Enter password" class="form-control">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me">
                            <label for="remember-me" class="form-check-label">Remember Me</label>
                        </div>
                        <a href="<?php echo BASEURL ?>/credential/forgot" class="forgot-btn">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">Login</button>
                    </div>
                    <?php print_r($this->flash("msg","alert alert-danger"));  ?>
                </form>
            </div>
            <div class="sign-up">Don't have an account ? <a href="<?php echo BASEURL ?>/credential/signup">Signup now!</a></div>
        </div>
    </div>
    <!-- Login Page End Here -->
    
    <?php linkJquery("js/jquery-3.3.1.min.js") ?>
    <?php linkJquery("js/plugins.js") ?>
    <?php linkJquery("js/popper.min.js") ?>
    <?php linkJquery("js/bootstrap.min.js") ?>
    <?php linkJquery("js/jquery.scrollUp.min.js") ?>
    <?php linkJquery("js/main.js") ?>
</body>
</html>