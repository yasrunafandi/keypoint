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
        <h2 style="margin-top:0px">Gatway Read</h2>
        <div class="container">
        <table class="table">
	    <tr><td>Nama Gatway</td><td><?php echo $Nama_Gatway; ?></td></tr>
	    <tr><td>IP Gatway</td><td><?php echo $IP_Gatway; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('gatway') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
    </div>
        </body>
</html>