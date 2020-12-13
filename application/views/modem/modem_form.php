<!doctype html>
<html>
    <head>
        <title>Modem</title>
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
    <h2 style="margin-top:0px" ><b>Modem <?php echo $button ?></b></h2>
    <br>  <br>  <br>  
<div class="container">
    <form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-25">
        <label for="varchar">Id Modem <?php echo form_error('Id_Modem') ?></label>
        </div>
        <div class="col-75">
        <input type="text" class="form-control" name="Id_Modem" id="Id_Modem" placeholder="Id Modem" value="<?php echo $Id_Modem; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="varchar">Type Modem <?php echo form_error('Type_Modem') ?></label>
            </div>
        <div class="col-75">
            <input type="text" class="form-control" name="Type_Modem" id="Type_Modem" placeholder="Type Modem" value="<?php echo $Type_Modem; ?>" />
            </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="varchar">No IMEI SN <?php echo form_error('No_IMEI_SN') ?></label>
            </div>
        <div class="col-75">
            <input type="text" class="form-control" name="No_IMEI_SN" id="No_IMEI_SN" placeholder="No IMEI SN" value="<?php echo $No_IMEI_SN; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="varchar">IP Modem <?php echo form_error('IP_Modem') ?></label>
            </div>
        <div class="col-75">
            <input type="text" class="form-control" name="IP_Modem" id="IP_Modem" placeholder="IP Modem" value="<?php echo $IP_Modem; ?>" />
        </div>
    </div>
	    <input type="hidden" name="Id" value="<?php echo $Id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('modem') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
    </body>
</html>