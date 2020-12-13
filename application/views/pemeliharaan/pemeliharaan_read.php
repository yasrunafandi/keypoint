<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pemeliharaan Read</h2>
        <table class="table">
	    <tr><td>Id Keypoint</td><td><?php echo $Id_Keypoint; ?></td></tr>
	    <tr><td>Id Baterai</td><td><?php echo $Id_Baterai; ?></td></tr>
	    <tr><td>Id Gatway</td><td><?php echo $Id_Gatway; ?></td></tr>
	    <tr><td>Id Gembok</td><td><?php echo $Id_Gembok; ?></td></tr>
	    <tr><td>Id Lokasi</td><td><?php echo $Id_Lokasi; ?></td></tr>
	    <tr><td>Id Modem</td><td><?php echo $Id; ?></td></tr>
	    <tr><td>Id SIM</td><td><?php echo $Id_SIM; ?></td></tr>
	    <tr><td>Id Status Switch Gear</td><td><?php echo $Id_Status_Switch_Gear; ?></td></tr>
	    <tr><td>Status Akhir</td><td><?php echo $Status_Akhir; ?></td></tr>
	    <tr><td>Kesiapan Peralatan</td><td><?php echo $Kesiapan_Peralatan; ?></td></tr>
	    <tr><td>Titik Terpelihara</td><td><?php echo $Titik_Terpelihara; ?></td></tr>
		<tr><td>TGL PERGANTIAN BATERAI</td><td><?php echo $TGL_PERGANTIAN_BATERAI; ?></td></tr>
	    <tr><td>TGL HAR TERAKHIR</td><td><?php echo $TGL_HAR_TERAKHIR; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $Keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pemeliharaan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>