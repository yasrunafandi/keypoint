<!doctype html>
<html>
    <head>
        <title>Switch Gear</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Switch_gear Read</h2>
        <table class="table">
	    <tr><td>Status Switch Gear</td><td><?php echo $Status_Switch_Gear; ?></td></tr>
	    <tr><td>Penyulang1</td><td><?php echo $Penyulang1; ?></td></tr>
	    <tr><td>Penyulang2</td><td><?php echo $Penyulang2; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('switch_gear') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>