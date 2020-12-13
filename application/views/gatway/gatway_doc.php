<!doctype html>
<html>
    <head>
        <title>Gatway</title>
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
        <h2>Gatway List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Gatway</th>
		<th>IP Gatway</th>
		
            </tr><?php
            foreach ($gatway_data as $gatway)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $gatway->Nama_Gatway ?></td>
		      <td><?php echo $gatway->IP_Gatway ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>