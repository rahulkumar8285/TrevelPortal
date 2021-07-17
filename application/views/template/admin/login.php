<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ;?>public/adminassets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>public/adminassets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ;?>public/adminassets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url() ;?>public/adminassets/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 col-12">
               
                <div id="auth-left">
                    <?php
                    if(!empty(validation_errors())){
                        echo '
                        <div class="alert alert-danger" role="alert">
                        '.validation_errors().'
                    </div>';
                    }
                    if(!empty($error)){
                        echo '
                        <div class="alert alert-danger" role="alert">
                        '.$error.'
                    </div>';
                    }
                    ?>

                    <h1 class="auth-title">Log in.</h1>
                    <form action="<?php echo base_url('AdminLogin')?>" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" placeholder="Email" name="email"
                                id="email" value="<?php echo set_value('email');?>">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                value="<?php echo set_value('password');?>" name="password" id="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                       <?php
                        // echo $captcha['image']
                       ?>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>