<!doctype html>
<html>
    <head>
        <title>Gembok</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/main.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Gembok <?php echo $button ?></h2>
        <br>  <br>  <br>  
<div class="container">
        <form action="<?php echo $action; ?>" method="post">
        <div class="row">
        <div class="col-25">
            <label for="varchar">Gembok Panel <?php echo form_error('Gembok_Panel') ?></label>
            </div>
        <div class="col-75">
            <input type="text"  name="Gembok_Panel" id="Gembok_Panel" placeholder="Gembok Panel" value="<?php echo $Gembok_Panel; ?>" />
        </div>
        </div>
        
        
	    <input type="hidden" name="Id_Gembok" value="<?php echo $Id_Gembok; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('gembok') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>