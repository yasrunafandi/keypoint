<!doctype html>
<html>
    <head>
        <title>Keypoint</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/main.css') ?>"/> 

<meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
    <br>    
    <h2 style="margin-top:0px" ><b>Tb_Keypoint <?php echo $button ?></b></h2>
    <br>  <br>  <br>  
<div class="container">
    <form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-25">
            <label for="varchar">Nama Keypoint Dilokasi <?php echo form_error('Nama_Keypoint_Dilokasi') ?></label></div>
        <div class="col-75">
            <input type="text" class="form-control" name="Nama_Keypoint_Dilokasi" id="Nama_Keypoint_Dilokasi" placeholder="Nama Keypoint Dilokasi" value="<?php echo $Nama_Keypoint_Dilokasi; ?>" />
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="varchar">Nama Keypoint Discada <?php echo form_error('Nama_Keypoint_Discada') ?></label>
            </div>
                <div class="col-75">
            <input type="text" class="form-control" name="Nama_Keypoint_Discada" id="Nama_Keypoint_Discada" placeholder="Nama Keypoint Discada" value="<?php echo $Nama_Keypoint_Discada; ?>" />
        </div></div>

	    <div class="row">
        <div class="col-25">
            <label for="varchar">Jenis Keypoint <?php echo form_error('Jenis_Keypoint') ?></label></div>
                <div class="col-75">
            <input type="text" class="form-control" name="Jenis_Keypoint" id="Jenis_Keypoint" placeholder="Jenis Keypoint" value="<?php echo $Jenis_Keypoint; ?>" />
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="varchar">Merk RTU <?php echo form_error('Merk_RTU') ?></label></div>
                <div class="col-75">
            <input type="text" class="form-control" name="Merk_RTU" id="Merk_RTU" placeholder="Merk RTU" value="<?php echo $Merk_RTU; ?>" />
        </div></div>
        <div class="row">
        <div class="col-25">
            <label for="varchar">No Seri RTU <?php echo form_error('No_Seri_RTU') ?></label></div>
                <div class="col-75">
            <input type="text" class="form-control" name="No_Seri_RTU" id="No_Seri_RTU" placeholder="No Seri RTU" value="<?php echo $No_Seri_RTU; ?>" />
        </div></div>
	    
        <div class="row">
        <div class="col-25">
            <label for="varchar">Alamat Keypoint <?php echo form_error('Alamat_Keypoint') ?></label></div>
                <div class="col-75">
            <input type="text" class="form-control" name="Alamat_Keypoint" id="Alamat_Keypoint" placeholder="Alamat Keypoint" value="<?php echo $Alamat_Keypoint; ?>" />
        </div></div>

	    <div class="row">
        <div class="col-25">
            <label for="varchar">GPS <?php echo form_error('GPS') ?></label></div>
                <div class="col-75">
            <input type="text" class="form-control" name="GPS" id="GPS" placeholder="GPS" value="<?php echo $GPS; ?>" />
        </div></div>
	    <input type="hidden" name="Id_Keypoint" value="<?php echo $Id_Keypoint; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tb_keypoint') ?>" class="btn btn-default">Cancel</a>
	</form></div>
    </body>
</html>