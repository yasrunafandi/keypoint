<!doctype html>
<html>
    <head>
        <title>Manager</title>
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
        <h2>Laporan Manager List</h2>
        <table class="word-table" style="margin-bottom: 10px" width=100%;>
            <tr>
                <th>No</th>
		<th>Area</th>
		<th>Rayon</th>
		<th>Gardu Induk</th>
        <th>Penyulang1</th>
		<th>Penyulang2</th>
		<th>Status_Switch_Gear</th>
		<th>Nama Keypoint Dilokasi</th>
		<th>Nama Keypoint Discada</th>
		<th>idmodem</th>
		<th>Nama Gatway</th>
        <th>Ip Gatway</th>
		<th>GPS</th>
		<th>Alamat Keypoint</th>
		<th>Jenis Keypoint</th>
		<th>Type Modem</th>
		<th>No IMEI SN</th>
		<th>Ip Modem</th>
		<th>Merk RTU</th>
		<th>No Seri RTU</th>
        <th>Provider</th>
		<th>Ip SIM</th>
		<th>No SIM</th>
		<th>No ICCID</th>
		<th>Merk</th>
		<th>Kapasitas</th>
        <th>Jumlah</th>
		<th>TGL PERGANTIAN BATERAI</th>
		<th>Gembok Panel</th>
		<th>TGL HAR TERAKHIR</th>
		<th>Status Akhir</th>
		<th>Kesiapan Peralatan</th>
		<th>Keterangan</th>
        <th>Titik Terpelihara</th>

            </tr><?php
            foreach ($manager_data as $manager)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $manager->Area ?></td>
		      <td><?php echo $manager->Rayon ?></td>
		      <td><?php echo $manager->Gardu_Induk ?></td>
              <td><?php echo $manager->Penyulang1 ?></td>
		      <td><?php echo $manager->Penyulang2 ?></td>
		      <td><?php echo $manager->Status_Switch_Gear ?></td>
		      <td><?php echo $manager->Nama_Keypoint_Dilokasi ?></td>
		      <td><?php echo $manager->Nama_Keypoint_Discada ?></td>
		      <td><?php echo $manager->idmodem ?></td>
		      <td><?php echo $manager->Nama_Gatway ?></td>
		      <td><?php echo $manager->Ip_Gatway ?></td>
		      <td><?php echo $manager->GPS ?></td>
		      <td><?php echo $manager->Alamat_Keypoint ?></td>
              <td><?php echo $manager->Jenis_Keypoint ?></td>
		      <td><?php echo $manager->Type_Modem ?></td>
		      <td><?php echo $manager->No_IMEI_SN ?></td>
		      <td><?php echo $manager->Ip_Modem ?></td>
		      <td><?php echo $manager->Merk_RTU ?></td>
		      <td><?php echo $manager->No_Seri_RTU ?></td>
		      <td><?php echo $manager->Provider ?></td>
		      <td><?php echo $manager->Ip_SIM ?></td>
		      <td><?php echo $manager->No_SIM ?></td>
		      <td><?php echo $manager->No_ICCID ?></td>
		      <td><?php echo $manager->Merk ?></td>
              <td><?php echo $manager->Kapasitas ?></td>
		      <td><?php echo $manager->Jumlah ?></td>
		      <td><?php echo $manager->TGL_PERGANTIAN_BATERAI ?></td>
		      <td><?php echo $manager->Gembok_Panel ?></td>
		      <td><?php echo $manager->TGL_HAR_TERAKHIR ?></td>
              <td><?php echo $manager->Status_Akhir ?></td>
		      <td><?php echo $manager->Kesiapan_Peralatan ?></td>
		      <td><?php echo $manager->Keterangan ?></td>
              <td><?php echo $manager->Titik_Terpelihara ?></td>
		      	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>