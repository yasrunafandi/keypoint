<!doctype html>
<html>
    <head>
        <title>Lokasi</title>
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
    <h2 style="margin-top:0px" ><b>Lokasi <?php echo $button ?></b></h2>
    <br>  <br>  <br>  
<div class="container">
    <form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-25">
            <label for="varchar">Area <?php echo form_error('Area') ?></label>
        </div>
        <div class="col-75">
            <input type="text" class="form-control" name="Area" id="Area" placeholder="Area" value="<?php echo $Area; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-25">
        <label for="varchar">Rayon <?php echo form_error('Rayon') ?></label>
        </div>
        <div class="col-75">
        <input type="text" class="form-control" name="Rayon" id="Rayon" placeholder="Rayon" value="<?php echo $Rayon; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-25">
        <label for="varchar">Gardu Induk <?php echo form_error('Gardu_Induk') ?></label>
        </div>
        <div class="col-75">
        <input type="text" class="form-control" name="Gardu_Induk" id="Gardu_Induk" placeholder="Gardu Induk" value="<?php echo $Gardu_Induk; ?>" />
        </div>
    </div>

	    <input type="hidden" name="Id_Lokasi" value="<?php echo $Id_Lokasi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('lokasi') ?>" class="btn btn-default">Cancel</a>

	</form>
    </div>
    </body>
</html>