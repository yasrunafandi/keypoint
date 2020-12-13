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
        <h2 style="margin-top:0px">Gembok Read</h2>
        <div class="container">
        <table class="table">
	    <tr><td>Gembok Panel</td><td><?php echo $Gembok_Panel; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('gembok') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
    </div>
        </body>
</html>