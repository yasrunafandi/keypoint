<!doctype html>
<html>
    <head>
        <title>Sim_Card</title>
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
    <h2 style="margin-top:0px" ><b>Sim_Card <?php echo $button ?></b></h2>
    <br>  <br>  <br>  
<div class="container">
    <form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-25">
            <label for="varchar">Provider <?php echo form_error('Provider') ?></label>
            </div>
        <div class="col-75">
            <input type="text" class="form-control" name="Provider" id="Provider" placeholder="Provider" value="<?php echo $Provider; ?>" />
        </div>
        </div>

        <div class="row">
        <div class="col-25">
            <label for="varchar">IP SIM <?php echo form_error('IP_SIM') ?></label> </div>
        <div class="col-75">
            <input type="text" class="form-control" name="IP_SIM" id="IP_SIM" placeholder="IP SIM" value="<?php echo $IP_SIM; ?>" />
        </div>
        </div>

	    <div class="row">
        <div class="col-25">
            <label for="varchar">No SIM <?php echo form_error('No_SIM') ?></label></div>
        <div class="col-75">
            <input type="text" class="form-control" name="No_SIM" id="No_SIM" placeholder="No SIM" value="<?php echo $No_SIM; ?>" />
        </div></div>

	    <div class="row">
        <div class="col-25">
            <label for="int">No ICCID <?php echo form_error('No_ICCID') ?></label></div>
        <div class="col-75">
            <input type="text" class="form-control" name="No_ICCID" id="No_ICCID" placeholder="No ICCID" value="<?php echo $No_ICCID; ?>" />
        </div></div>
	    
	    <input type="hidden" name="Id_SIM" value="<?php echo $Id_SIM; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sim_card') ?>" class="btn btn-default">Cancel</a>
	</form></div>
    </body>
</html>