<!doctype html>
<html>
    <head>
        <title>Sim Card</title>
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
        <h2>Sim_card List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Provider</th>
		<th>IP SIM</th>
		<th>No SIM</th>
		<th>No ICCID</th>
		
            </tr><?php
            foreach ($sim_card_data as $sim_card)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sim_card->Provider ?></td>
		      <td><?php echo $sim_card->IP_SIM ?></td>
		      <td><?php echo $sim_card->No_SIM ?></td>
		      <td><?php echo $sim_card->No_ICCID ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>