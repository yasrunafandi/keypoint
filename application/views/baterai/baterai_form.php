<!doctype html>
<html>
    <head>
        <title>Baterai</title>
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
    <h2 style="margin-top:0px" ><b>Baterai <?php echo $button ?></b></h2>
    <br>  <br>  <br>  
<div class="container">
    <form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-25">
            <label for="varchar">Merk <?php echo form_error('Merk') ?></label>
        </div>
        <div class="col-75">
        <input type="text"  name="Merk" id="Merk" placeholder="Merk" value="<?php echo $Merk; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-25">
           <label for="varchar">Kapasitas <?php echo form_error('Kapasitas') ?></label>
        </div>
        <div class="col-75">
        <input type="text" name="Kapasitas" id="Kapasitas" placeholder="Kapasitas" value="<?php echo $Kapasitas; ?>" />
        </div>
    </div>
        <div class="row">
      <div class="col-25">
            <label for="int">Jumlah <?php echo form_error('Jumlah') ?></label>
            </div>
      <div class="col-75">
            <input type="text"  name="Jumlah" id="Jumlah" placeholder="Jumlah" value="<?php echo $Jumlah; ?>" />
        </div>
</div>

	    <input type="hidden" name="Id_Baterai" value="<?php echo $Id_Baterai; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('baterai') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>