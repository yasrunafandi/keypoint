<!doctype html>
<html>
    <head>
        <title>staf</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/AdminLTE.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/skins/skin-black.min.css">
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
    <body>
    <body class="hold-transition skin-black sidebar-collapse sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?= site_url('home') ?>" class="logo">
                    <span class="logo-mini"><b>S.</b></span>
                    <span class="logo-lg"><b>Staf</b></span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?= site_url('login/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU</li>
                        <li class="active">
                            <a href="<?= site_url('baterai') ?>">
                                <i class="fa fa-dashboard"></i> <span>Baterai</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?= site_url('gatway') ?>">
                                <i class="fa fa-dashboard"></i> <span>Gatway</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?= site_url('gembok') ?>">
                                <i class="fa fa-dashboard"></i> <span>Gembok</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?= site_url('lokasi') ?>">
                                <i class="fa fa-dashboard"></i> <span>Lokasi</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?= site_url('modem') ?>">
                                <i class="fa fa-dashboard"></i> <span>Modem</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?= site_url('sim_card') ?>">
                                <i class="fa fa-dashboard"></i> <span>Sim Card</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?= site_url('switch_gear') ?>">
                                <i class="fa fa-dashboard"></i> <span>Switch Gear</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?= site_url('tb_keypoint') ?>">
                                <i class="fa fa-dashboard"></i> <span>Keypoint</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?= site_url('pemeliharaan') ?>">
                                <i class="fa fa-dashboard"></i> <span>Pemeliharaan</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
               
    <br><br>
       <center><img src="<?php echo base_url();?>assets/img/pln.jpg" width=100%><center>
       
       </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.7/push.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/js/adminlte.min.js"></script>
       
    </body>
</html>
      
    </body>
</html>