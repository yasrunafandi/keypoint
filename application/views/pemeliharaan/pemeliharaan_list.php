<!doctype html>
<html>
    <head>
        <title>pemeliharaan</title>
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
            #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
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

        <h2 style="margin-top:0px"><a href="<?php echo base_url();?>home"> Pemeliharaan List</a></h2>
        <div class="row" style="margin-left: 5px; margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pemeliharaan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4">
            <h2 style="margin-top:0px"><a href="<?php echo base_url();?>maps"> Search Maps</a></h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pemeliharaan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pemeliharaan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
                <!-- <form action ="pemeliharaan_list.php" class="form-inline" method="get">
                    <input type="text" class="form-control" name="cari">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form> -->
            </div>
        </div>
        <div class="table-responsive">
        <?php
           if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : ".$cari."</b>";
        }
        
        ?>
        <div class="table-responsive">
        <table id="customers" style="margin-bottom: 10px ">
            <tr>
                <th>No</th>
		<th>Nama Keypoint</th>
		<th>Merk Baterai</th>
		<th>Gatway</th>
		<th>Gembok Panel</th>
		<th>Lokasi</th>
		<th>Id Modem</th>
		<th>SIM</th>
		<th>Status Switch Gear</th>
		<th>Status Akhir</th>
		<th>Kesiapan Peralatan</th>
		<th>Titik Terpelihara</th>
        <th>TGL PERGANTIAN BATERAI</th>
		<th>TGL HAR TERAKHIR</th>
		<th>Keterangan</th>
		<th>Action</th>
            </tr>
            <?php 

    //     $query = $this->db->query('SELECT pml.*,
    //     lk.Area, lk.Rayon, lk.Gardu_Induk, 
    //     sg.Penyulang1, sg.Penyulang2, sg.Status_Switch_Gear,
    //     kp.Nama_Keypoint_Dilokasi, kp.Nama_Keypoint_Discada,
    //     md.Id_Modem, gt.Nama_Gatway, gt.Ip_Gatway, kp.GPS,
    //     kp.Alamat_Keypoint, kp.Jenis_Keypoint, md.Type_Modem,
    //     md.No_IMEI_SN, md.Ip_Modem,
    //     kp.Merk_RTU, kp.No_Seri_RTU,
    //     sc.Provider, sc.IP_SIM, sc.No_SIM, sc.No_ICCID, 
    //     bt.Merk, bt.Kapasitas, bt.Jumlah, 
    //     gb.Gembok_Panel
    
    // FROM pemeliharaan pml
    // LEFT JOIN tb_keypoint kp ON pml.Id_Keypoint=kp.Id_Keypoint
    // LEFT JOIN baterai bt ON pml.Id_Baterai=bt.Id_Baterai
    // LEFT JOIN gatway gt ON pml.Id_Gatway=gt.Id_Gatway
    // LEFT JOIN switch_gear sg ON pml.Id_Status_Switch_Gear=sg.Id_Status_Switch_Gear
    // LEFT JOIN gembok gb ON pml.Id_Gembok=gb.Id_Gembok
    // LEFT JOIN lokasi lk ON pml.Id_Lokasi=lk.Id_Lokasi
    // LEFT JOIN sim_card sc ON pml.Id_SIM=sc.Id_SIM
    // LEFT JOIN modem md ON pml.Id=md.Id');
    
                $no = 1;
            foreach ($pemeliharaan_data->result() as $row){
            
                ?>       
                <tr>
			<td width="80px"><?php echo $no++ ?></td>
			<td> <?php echo $row->Nama_Keypoint_Dilokasi ?></td>
			<td><?php echo $row->Merk ?></td>
			<td><?php echo $row->Nama_Gatway ?></td>
			<td><?php echo $row->Gembok_Panel ?></td>
			<td><?php echo $row->Area . " " . $row->Rayon . " " . $row->Gardu_Induk ?></td>
			<td><?php echo $row->Id_Modem ?></td>
			<td><?php echo $row->Provider . " " . $row->IP_SIM ?></td>
			<td><?php echo $row->Status_Switch_Gear . " " . $row->Penyulang1 ." ". $row->Penyulang2 ?></td>
			<td><?php echo $row->Status_Akhir ?></td>
			<td><?php echo $row->Kesiapan_Peralatan ?></td>
			<td><?php echo $row->Titik_Terpelihara ?></td>
            <td><?php echo $row->TGL_PERGANTIAN_BATERAI?></td>
			<td><?php echo $row->TGL_HAR_TERAKHIR ?></td>
			<td><?php echo $row->Keterangan ?></td>

			<td style="text-align:center" width="200px">
				<?php 
				 echo anchor(site_url('pemeliharaan/read/'.$row->Id_Pemeliharaan),'Read'); 
				echo ' | '; 
				 echo anchor(site_url('pemeliharaan/update/'.$row->Id_Pemeliharaan),'Update'); 
				echo ' | '; 
				 echo anchor(site_url('pemeliharaan/delete/'.$row->Id_Pemeliharaan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php }   ?>
        </table>
        </div>
        </div>
        <div class="row" style="margin-left: 5px">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pemeliharaan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pemeliharaan/word'), 'Word', 'class="btn btn-primary"'); ?>
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