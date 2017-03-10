<!--

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */

-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php echo base_url()?>assests/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assests/bootstrap/css/bootstrap-material-design.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assests/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assests/bootstrap/css/ripples.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assests/bootstrap/custom_login.css"/>

	<script src="<?php echo base_url()?>assests/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url()?>assests/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assests/bootstrap/js/material.min.js"></script>
	<script src="<?php echo base_url()?>assests/bootstrap/js/ripples.min.js"></script>

	<title>Anwar's Portofolio Admin Login</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo-container"></div>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
      	<span class="text-danger"><?php echo validation_errors();?></span>
        <form action="<?php echo base_url();?>admin/admin_login" id="loginForm" method="post">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input class="form-control" type="email" name='email' placeholder="email"/>          
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" type="password" name='password' placeholder="password"/>     
          </div>
          <div class="checkbox">
            <label>
              <input class="form-control" type="checkbox"> I agree to the <a href="#">Terms and Conditions</a>
            </label>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-def btn-block btn-success" name="admin_log" style="color: black" value="Login"/>
          </div>
        </form>        
      </div>  
    </div>    
  </div>
</div>
</body>
</html>