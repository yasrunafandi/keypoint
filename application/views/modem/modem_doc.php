<!doctype html>
<html>
    <head>
        <title>Modem</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Modem List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Modem</th>
		<th>Type Modem</th>
		<th>No IMEI SN</th>
		<th>IP Modem</th>
		
            </tr><?php
            foreach ($modem_data as $modem)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $modem->Id_Modem ?></td>
		      <td><?php echo $modem->Type_Modem ?></td>
		      <td><?php echo $modem->No_IMEI_SN ?></td>
		      <td><?php echo $modem->IP_Modem ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>