<!doctype html>
<html>
    <head>
        <title>Switch Gear</title>
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
        <h2>Switch_gear List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Status Switch Gear</th>
		<th>Penyulang1</th>
		<th>Penyulang2</th>
		
            </tr><?php
            foreach ($switch_gear_data as $switch_gear)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $switch_gear->Status_Switch_Gear ?></td>
		      <td><?php echo $switch_gear->Penyulang1 ?></td>
		      <td><?php echo $switch_gear->Penyulang2 ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>