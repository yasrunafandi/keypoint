<!doctype html>
<html>
    <head>
        <title>Modem</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Modem Read</h2>
        <table class="table">
	    <tr><td>Id Modem</td><td><?php echo $Id_Modem; ?></td></tr>
	    <tr><td>Type Modem</td><td><?php echo $Type_Modem; ?></td></tr>
	    <tr><td>No IMEI SN</td><td><?php echo $No_IMEI_SN; ?></td></tr>
	    <tr><td>IP Modem</td><td><?php echo $IP_Modem; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('modem') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>