<!doctype html>
<html>
    <head>
        <title>Sim Card</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Staf</title>
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
        <style>
            body{
                padding: 15px;
            }
        </style>
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
            <div class="content-wrapper" >
               
    <br><br>
        <h2 style="margin-top:0px"><a href="<?php echo base_url();?>home"> Sim_card List</a></h2>
        <div class="row" style="margin-left: 5px; margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sim_card/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sim_card/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sim_card'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Provider</th>
		<th>IP SIM</th>
		<th>No SIM</th>
		<th>No ICCID</th>
		<th>Action</th>
            </tr><?php
            foreach ($sim_card_data as $sim_card)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sim_card->Provider ?></td>
			<td><?php echo $sim_card->IP_SIM ?></td>
			<td><?php echo $sim_card->No_SIM ?></td>
			<td><?php echo $sim_card->No_ICCID ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('sim_card/read/'.$sim_card->Id_SIM),'Read'); 
				echo ' | '; 
				echo anchor(site_url('sim_card/update/'.$sim_card->Id_SIM),'Update'); 
				echo ' | '; 
				echo anchor(site_url('sim_card/delete/'.$sim_card->Id_SIM),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row" style="margin-left: 5px">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('sim_card/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('sim_card/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
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