<!doctype html>
<html>
    <head>
        <title>Gatway</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/main.css') ?>"/> 
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
    
        <h2 style="margin-top:0px">Gatway <?php echo $button ?></h2>
        <br>  <br>  <br>  
<div class="container">
        <form action="<?php echo $action; ?>" method="post">
        <div class="row">
        <div class="col-25">
            <label for="varchar">Nama Gatway <?php echo form_error('Nama_Gatway') ?></label>
        </div>
        <div class="col-75">
            <input type="text"  name="Nama_Gatway" id="Nama_Gatway" placeholder="Nama Gatway" value="<?php echo $Nama_Gatway; ?>" />
        </div>
        </div>
        <div class="row">
        <div class="col-25">
            <label for="varchar">IP Gatway <?php echo form_error('IP_Gatway') ?></label>
            </div>
        <div class="col-75">
            <input type="text"  name="IP_Gatway" id="IP_Gatway" placeholder="IP Gatway" value="<?php echo $IP_Gatway; ?>" />
        </div>
        </div>
        <br><br><br>
	    <input type="hidden" name="Id_Gatway" value="<?php echo $Id_Gatway; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('gatway') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>