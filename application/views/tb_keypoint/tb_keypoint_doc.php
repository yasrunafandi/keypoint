<!doctype html>
<html>
    <head>
        <title>Keypoint</title>
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
        <h2>Tb_keypoint List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Keypoint Dilokasi</th>
		<th>Nama Keypoint Discada</th>
		<th>Jenis Keypoint</th>
		<th>Merk RTU</th>
		<th>No Seri RTU</th>
		<th>Alamat Keypoint</th>
		<th>GPS</th>
		
            </tr><?php
            foreach ($tb_keypoint_data as $tb_keypoint)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tb_keypoint->Nama_Keypoint_Dilokasi ?></td>
		      <td><?php echo $tb_keypoint->Nama_Keypoint_Discada ?></td>
		      <td><?php echo $tb_keypoint->Jenis_Keypoint ?></td>
		      <td><?php echo $tb_keypoint->Merk_RTU ?></td>
		      <td><?php echo $tb_keypoint->No_Seri_RTU ?></td>
		      <td><?php echo $tb_keypoint->Alamat_Keypoint ?></td>
		      <td><?php echo $tb_keypoint->GPS ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>