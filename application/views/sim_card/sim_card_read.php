<!doctype html>
<html>
    <head>
        <title>Sim_card</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Sim_card Read</h2>
        <table class="table">
	    <tr><td>Provider</td><td><?php echo $Provider; ?></td></tr>
	    <tr><td>IP SIM</td><td><?php echo $IP_SIM; ?></td></tr>
	    <tr><td>No SIM</td><td><?php echo $No_SIM; ?></td></tr>
	    <tr><td>No ICCID</td><td><?php echo $No_ICCID; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sim_card') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>