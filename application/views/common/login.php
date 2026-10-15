
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mayoori Furnitures-ERP LOGIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_styles/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_styles/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_styles/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_styles/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<center><img src="<?php echo base_url()?>uploads/admin/logo.png" width="100" class="img-circle" alt="User Image"></center>
  <div class="login-logo">
     
	 <!--<a href="../../index2.html"><b>ESPY LABS</b></a>-->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo site_url('Admin/loginCheck');?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="uname" class="form-control" placeholder="Username">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
		
        
        
       <!-- <div class="form-group has-feedback">
          <select name="comm" class="form-control">
          	<option>Admin</option>
          	<?php
          	foreach($comm as $key){
          		?>
          	<option value="<?php echo $key->id;?>"><?php echo $key->committe;?></option>
          	<?php
			}
			?>
          </select>
        </div>-->
		
		<!--<div class="form-group has-feedback">
          <select name="act" class="form-control">
          	<option>Select</option>
          	<?php
          	foreach($activity as $key){
          		?>
          	<option value="<?php echo $key->id;?>"><?php echo $key->activity;?></option>
          	<?php
			}
			?>
          </select>
        </div>-->
		
		
        <div class="row">
         <div class="col-8">
            <!--<div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>-->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            <center><p><b>Version 5.0.4 </b><br>copyright @ <strong style="color:orange;"> Mayoori Glimpse </strong></p></center>
           
          </div>
          <!-- /.col -->
        </div>
      </form>
   <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->

    <!--<a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
  <br>
  <br>
  
 
</div>

<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>admin_styles/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>admin_styles/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>admin_styles/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
