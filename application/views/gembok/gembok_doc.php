<!doctype html>
<html>
    <head>
        <title>Gembok</title>
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
        <h2>Gembok List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Gembok Panel</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($gembok_data as $gembok)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $gembok->Gembok_Panel ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>