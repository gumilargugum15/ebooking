<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Register</title>

    <!-- Bootstrap core CSS-->
    <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        
        <div class="card-body">
        <div id="infoMessage"><?php echo $message;?></div>
          <?php echo form_open("members/home/register");?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <!--input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="firstName">First name</label-->
                    <?php echo form_input($first_name);?>
                    <label for="firstName"><?php echo lang('create_user_fname_label', 'first_name');?></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <!--input type="text" id="lastName" class="form-control" placeholder="Last name" required="required">
                    <label for="lastName">Last name</label-->
                    <?php echo form_input($last_name);?>
                    <label for="lastName"><?php echo lang('create_user_lname_label', 'last_name');?></label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <!--input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label-->
                <?php
                  if($identity_column!=='email') {
                      echo '<p>';
                      echo lang('create_user_identity_label', 'identity');
                      echo '<br />';
                      echo form_error('identity');
                      echo form_input($identity);
                      echo '</p>';
                  }
                  ?>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <!--input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label-->
                <?php echo form_input($company);?>
                <label for="company"><?php echo lang('create_user_company_label', 'company');?></label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <!--input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label-->
                <?php echo form_input($email);?>
                <label for="inputEmail"><?php echo lang('create_user_email_label', 'email');?></label>
                
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input($phone);?>
                <label for="phone"><?php echo lang('create_user_phone_label', 'phone');?></label>
                
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <!--input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label-->
                    <?php echo form_input($password);?>
                    <label for="password"><?php echo lang('create_user_password_label', 'password');?></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <!--input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirm password</label-->
                    <?php echo form_input($password_confirm);?>
                    <label for="password_confirm"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></label>
                  </div>
                </div>
              </div>
            </div>
            <!--a class="btn btn-primary btn-block" href="login.html">Register</a-->
            <?php echo form_submit('submit', lang('create_user_submit_btn'),array('class'=>'btn btn-primary btn-block'));?>
          <?php echo form_close();?>
          <div class="text-center">
            <!--a class="d-block small mt-3" href="login.html">Login Page</a-->
            <?php echo anchor("auth/login", 'Login page',array('class'=>'d-block small mt-3')) ;?>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
