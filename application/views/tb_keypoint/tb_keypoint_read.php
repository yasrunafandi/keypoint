<!doctype html>
<html>
    <head>
        <title>Keypoint</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_keypoint Read</h2>
        <table class="table">
	    <tr><td>Nama Keypoint Dilokasi</td><td><?php echo $Nama_Keypoint_Dilokasi; ?></td></tr>
	    <tr><td>Nama Keypoint Discada</td><td><?php echo $Nama_Keypoint_Discada; ?></td></tr>
	    <tr><td>Jenis Keypoint</td><td><?php echo $Jenis_Keypoint; ?></td></tr>
	    <tr><td>Merk RTU</td><td><?php echo $Merk_RTU; ?></td></tr>
	    <tr><td>No Seri RTU</td><td><?php echo $No_Seri_RTU; ?></td></tr>
	    <tr><td>Alamat Keypoint</td><td><?php echo $Alamat_Keypoint; ?></td></tr>
	    <tr><td>GPS</td><td><?php echo $GPS; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tb_keypoint') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>