<!doctype html>
<html>
    <head>
        <title>Switch Gear</title>
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
    <h2 style="margin-top:0px" ><b>Switc_Gear <?php echo $button ?></b></h2>
    <br>  <br>  <br>  
<div class="container">
    <form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-25">
            <label for="varchar">Status Switch Gear <?php echo form_error('Status_Switch_Gear') ?></label></div>
        <div class="col-75">
            <input type="text" class="form-control" name="Status_Switch_Gear" id="Status_Switch_Gear" placeholder="Status Switch Gear" value="<?php echo $Status_Switch_Gear; ?>" />
        </div></div>

	    <div class="row">
        <div class="col-25">
            <label for="varchar">Penyulang1 <?php echo form_error('Penyulang1') ?></label></div>
        <div class="col-75">
            <input type="text" class="form-control" name="Penyulang1" id="Penyulang1" placeholder="Penyulang1" value="<?php echo $Penyulang1; ?>" />
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="varchar">Penyulang2 <?php echo form_error('Penyulang2') ?></label></div>
        <div class="col-75">
            <input type="text" class="form-control" name="Penyulang2" id="Penyulang2" placeholder="Penyulang2" value="<?php echo $Penyulang2; ?>" />
        </div></div>
	    <input type="hidden" name="Id_Status_Switch_Gear" value="<?php echo $Id_Status_Switch_Gear; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('switch_gear') ?>" class="btn btn-default">Cancel</a>
	</form></div>
    </body>
</html>