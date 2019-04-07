<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>/css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <?php echo form_open("auth/login");?>
            <div class="form-group">
              <div class="form-label-group">
                <!--input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label-->
                
              </div>
              <?php echo form_input($identity);?>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <!--input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label-->
                
              </div>
              <?php echo form_input($password);?>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <!--label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label-->
                <?php echo lang('login_remember_label', 'remember');?>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
              </div>
            </div>
            <!--a class="btn btn-primary btn-block" href="index.html">Login</a-->
            <?php echo form_submit('submit', lang('login_submit_btn'), array('class' => 'btn btn-primary btn-block'));?>
          <?php echo form_close();?>
          <div class="text-center">
          <?php echo anchor("members/home/register", 'Registrasi',array('class'=>'d-block small mt-3')) ;?>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
