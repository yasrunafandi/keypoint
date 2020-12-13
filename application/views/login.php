<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/AdminLTE.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/AdminLTE.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/AdminLTE.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/dataTables.bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/font-awesome.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/font-awesome.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/login/css/bootstrap.min.css') ?>"/>

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?= site_url() ?>"><b>Silahkan Login</b></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Masukkan Username Dan Password Untuk Mengakses sistem.</p>
             
			 	<form id="loginForm" action="<?php echo base_url('login/aksi_login');?>" method="post">
                	<div class="form-group has-feedback">
      					<input type="text" name="username" class="form-control" placeholder="Username">
        				<span class="glyphicon glyphicon-user form-control-feedback"></span>
        				<span class="help-block"></span>
    				</div>
    				<div class="form-group has-feedback">
        				<input type="password" name="password" class="form-control" placeholder="Password">
        				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
        				<span class="help-block"></span>
    				</div>
    				<button type="submit" class="btn btn-primary btn-block" value="Login">Login</button>
				</form>
            </div>
        </div>

      
   
    </body>
</html>

	
