<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>Pemeliharaan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Keypoint</th>
		<th>Id Baterai</th>
		<th>Id Gatway</th>
		<th>Id Gembok</th>
		<th>Id Lokasi</th>
		<th>Id Modem</th>
		<th>Id SIM</th>
		<th>Id Status Switch Gear</th>
		<th>Status Akhir</th>
		<th>Kesiapan Peralatan</th>
		<th>Titik Terpelihara</th>
        <th>TGL PERGANTIAN BATERAI</th>
		<th>TGL HAR TERAKHIR</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($pemeliharaan_data as $pemeliharaan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pemeliharaan->Id_Keypoint ?></td>
		      <td><?php echo $pemeliharaan->Id_Baterai ?></td>
		      <td><?php echo $pemeliharaan->Id_Gatway ?></td>
		      <td><?php echo $pemeliharaan->Id_Gembok ?></td>
		      <td><?php echo $pemeliharaan->Id_Lokasi ?></td>
		      <td><?php echo $pemeliharaan->Id ?></td>
		      <td><?php echo $pemeliharaan->Id_SIM ?></td>
		      <td><?php echo $pemeliharaan->Id_Status_Switch_Gear ?></td>
		      <td><?php echo $pemeliharaan->Status_Akhir ?></td>
		      <td><?php echo $pemeliharaan->Kesiapan_Peralatan ?></td>
		      <td><?php echo $pemeliharaan->Titik_Terpelihara ?></td>
              <td><?php echo $baterai->TGL_PERGANTIAN_BATERAI ?></td>
		      <td><?php echo $pemeliharaan->TGL_HAR_TERAKHIR ?></td>
		      <td><?php echo $pemeliharaan->Keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>