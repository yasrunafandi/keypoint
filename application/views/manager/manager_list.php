<!doctype html>
<html>
    <head>
        <title>Manager</title>
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
                <a href="<?= site_url('manager') ?>" class="logo">
                    <span class="logo-mini"><b>M.</b></span>
                    <span class="logo-lg"><b>Manager</b></span>
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
  
            <div class="content-wrapper">
               
    <br><br>
       
    <h2 style="margin-top:0px; margin-left: 5px"><a href="<?php echo base_url();?>manager"> Laporan</a></h2>
    <br><br>
        <div class="row" style="margin-bottom: 10px">
        <div class="col-md-2 text-right" style="margin-left: 10px">
            <form action="<?=site_url('manager/area')?>" method="get">
            <select name='area' data-placeholder="Pilih AREA.." class="form-control">
            <option value="all" >Semua</option>
                   <option value="KLATEN" >KLATEN</option>
                   <option value="SURAKARTA" >SURAKARTA</option>
                   <option value="YOGYAKARTA" >YOGYAKARTA</option>
                   <option value=" MAGELANG" >MAGELANG</option>
                   </select>
                   
                   <button type="submit"> Filter</button>
            </form>
            </div>
                               
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            
            <div class="col-md-3 text-right" style="margin-left:20%">
                <form action="<?php echo site_url('manager/index'); ?>" class="form-inline" method="get">
                    <div class="input-group" >
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('manager'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
 <div class="table-responsive">
         <table class="table table-bordered" id="customers" style="margin-left:10px">
            <tr>
            <th>No</th>
		<th>Area</th>
		<th>Rayon</th>
		<th>Gardu Induk</th>
        <th>Penyulang1</th>
		<th>Penyulang2</th>
		<th>Status Switch Gear</th>
		<th>Nama Keypoint Dilokasi</th>
		<th>Nama Keypoint Discada</th>
		<th>idmodem</th>
		<th>Nama Gatway</th>
        <th>Ip Gatway</th>
		<th>GPS</th>
		<th>Alamat Keypoint</th>
		<th>Jenis Keypoint</th>
		<th>Type Modem</th>
		<th>No IMEI SN</th>
		<th>Ip Modem</th>
		<th>Merk RTU</th>
		<th>No Seri RTU</th>
        <th>Provider</th>
		<th>Ip SIM</th>
		<th>No SIM</th>
		<th>No ICCID</th>
		<th>Merk</th>
		<th>Kapasitas</th>
        <th>Jumlah</th>
		<th>TGL PERGANTIAN BATERAI</th>
		<th>Gembok Panel</th>
		<th>TGL HAR TERAKHIR</th>
		<th>Status Akhir</th>
		<th>Kesiapan Peralatan</th>
		<th>Keterangan</th>
        <th>Titik Terpelihara</th>

            </tr>
            <?php
            foreach ($manager_data as $manager)
            {
                ?>  
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
		      <td><?php echo $manager->Area ?></td>
		      <td><?php echo $manager->Rayon ?></td>
		      <td><?php echo $manager->Gardu_Induk ?></td>
              <td><?php echo $manager->Penyulang1 ?></td>
		      <td><?php echo $manager->Penyulang2 ?></td>
		      <td><?php echo $manager->Status_Switch_Gear ?></td>
		      <td><?php echo $manager->Nama_Keypoint_Dilokasi ?></td>
		      <td><?php echo $manager->Nama_Keypoint_Discada ?></td>
		      <td><?php echo $manager->idmodem ?></td>
		      <td><?php echo $manager->Nama_Gatway ?></td>
		      <td><?php echo $manager->Ip_Gatway ?></td>
		      <td><?php echo $manager->GPS ?></td>
		      <td><?php echo $manager->Alamat_Keypoint ?></td>
              <td><?php echo $manager->Jenis_Keypoint ?></td>
		      <td><?php echo $manager->Type_Modem ?></td>
		      <td><?php echo $manager->No_IMEI_SN ?></td>
		      <td><?php echo $manager->Ip_Modem ?></td>
		      <td><?php echo $manager->Merk_RTU ?></td>
		      <td><?php echo $manager->No_Seri_RTU ?></td>
		      <td><?php echo $manager->Provider ?></td>
		      <td><?php echo $manager->Ip_SIM ?></td>
		      <td><?php echo $manager->No_SIM ?></td>
		      <td><?php echo $manager->No_ICCID ?></td>
		      <td><?php echo $manager->Merk ?></td>
              <td><?php echo $manager->Kapasitas ?></td>
		      <td><?php echo $manager->Jumlah ?></td>
		      <td><?php echo $manager->TGL_PERGANTIAN_BATERAI ?></td>
		      <td><?php echo $manager->Gembok_Panel ?></td>
		      <td><?php echo $manager->TGL_HAR_TERAKHIR ?></td>
              <td><?php echo $manager->Status_Akhir ?></td>
		      <td><?php echo $manager->Kesiapan_Peralatan ?></td>
		      <td><?php echo $manager->Keterangan ?></td>
              <td><?php echo $manager->Titik_Terpelihara ?></td>

			
		</tr>
                <?php }   ?>
        </table>
        </div>
        <br><br>
        <div class="row" style="margin-left: 5px">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        <?php 
        $area = urldecode($this->input->get('area', TRUE));
        echo anchor(site_url('manager/excel/'.$area), 'Excel', 'class="btn btn-primary"'); 
        ?>
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
      
    </body>
</html>