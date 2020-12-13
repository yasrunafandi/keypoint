<!doctype html>
<html>
    <head>
        <title>Lokasi</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Lokasi Read</h2>
        <table class="table">
	    <tr><td>Area</td><td><?php echo $Area; ?></td></tr>
	    <tr><td>Rayon</td><td><?php echo $Rayon; ?></td></tr>
	    <tr><td>Gardu Induk</td><td><?php echo $Gardu_Induk; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('lokasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>