<!doctype html>
<html>
    <head>
        <title>Baterai</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/main.css') ?>"/> 
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Baterai Read</h2>
        <div class="container">
        <table class="table">
	    <tr><td>Merk</td><td><?php echo $Merk; ?></td></tr>
	    <tr><td>Kapasitas</td><td><?php echo $Kapasitas; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $Jumlah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('baterai') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>