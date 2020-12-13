<!doctype html>
<html>
    <head>
        <title>Baterai</title>
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
        <h2>Baterai List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Merk</th>
		<th>Kapasitas</th>
		<th>Jumlah</th>
		
		
            </tr><?php
            foreach ($baterai_data as $baterai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $baterai->Merk ?></td>
		      <td><?php echo $baterai->Kapasitas ?></td>
		      <td><?php echo $baterai->Jumlah ?></td>
		      	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>