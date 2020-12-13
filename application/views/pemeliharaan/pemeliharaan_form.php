<!doctype html>
<html>
    <head>
        <title>Pemeliharaan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/> 
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/main.css') ?>"/> 
        

        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
     body{
                padding: 15px;
            }

</style>
    </head>
    <body>
    <br>    
    <h2 style="margin-top:0px" ><b>Pemeliharaan <?php echo $button ?></b></h2>
    <br>  <br>  <br>  
<div class="container">
    <form action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-25">
            <label for="int">Nama Keypoint <?php echo form_error('Id_Keypoint') ?></label>
            </div>
        <div class="col-75">
        <select name='Id_Keypoint' data-placeholder="Pilih Nama Keypoint Dilokasi.." class="form-control">
                    <?php                  
                    $query = $this->db->query('SELECT * FROM tb_keypoint order by Id_Keypoint asc');
                    $result = $query->result_array();
                   
                    foreach ($result as $r) {
                      if ($r['Id_Keypoint'] == $Id_Keypoint) {
                        echo '<option value="' . $r['Id_Keypoint'] . '" selected="selected">' . $r['Nama_Keypoint_Dilokasi'] . '</option>';
                      } else {
                        echo '<option value="' . $r['Id_Keypoint'] . '">' . $r['Nama_Keypoint_Dilokasi'] . '</option>';
                      }
                    }
                    ?>
                    </select>
        </div>
        </div>
    <div class="row">
        <div class="col-25">
            <label for="int">Merk Baterai <?php echo form_error('Id_Baterai') ?></label></div>
        <div class="col-75">
        <select name='Id_Baterai' data-placeholder="Pilih Nama Baterai.." class="form-control">
                    <?php                  
                    $query = $this->db->query('SELECT * FROM baterai order by Id_Baterai asc');
                    $result = $query->result_array();
                   
                    foreach ($result as $r) {
                        if ($r['Id_Baterai'] == $Id_Baterai) {
                            echo '<option value="' . $r['Id_Baterai'] . '" selected= "selected">' . $r['Merk'] . " " . $r['Kapasitas'] . " " . $r['Jumlah'] . '</option>';
                        } else {
                            echo '<option value="' . $r['Id_Baterai'] . '">' . $r['Merk'] . " " . $r['Kapasitas'] . " " . $r['Jumlah'] . '</option>';
                    }
                }
                    ?>
                    </select>
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="int">Gatway <?php echo form_error('Id_Gatway') ?></label>
            </div>
        <div class="col-75">
        <select name='Id_Gatway' data-placeholder="Pilih Nama Gatway.." class="form-control">
                    <?php                  
                    $query = $this->db->query('SELECT * FROM gatway order by Id_Gatway asc');
                    $result = $query->result_array();
                        foreach ($result as $r) {
                            if ($r['Id_Gatway'] == $Id_Gatway) {
                                echo '<option value="' . $r['Id_Gatway'] . '" selected= "selected">' . $r['Nama_Gatway']  . '</option>';
                            } else {
                                echo '<option value="' . $r['Id_Gatway'] . '" >' . $r['Nama_Gatway']  . '</option>';
                    }
                }
                    ?>
                    </select>
        </div></div>
        <div class="row">
        <div class="col-25">
            <label for="int">Gembok Panel <?php echo form_error('Id_Gembok') ?></label>
            </div>
        <div class="col-75">
        <select name='Id_Gembok' data-placeholder="Pilih Gembok Panel.." class="form-control">
                    <?php                  
                    $query = $this->db->query('SELECT * FROM gembok order by Id_Gembok asc');
                    $result = $query->result_array();
                  
                    foreach ($result as $r) {
                        if ($r['Id_Gembok'] == $Id_Gembok) {
                            echo '<option value="' . $r['Id_Gembok'] . '" selected= "selected">' . $r['Gembok_Panel']  . '</option>';
                        } else {
                            echo '<option value="' . $r['Id_Gembok'] . '" >' . $r['Gembok_Panel']  . '</option>';
                    }}
                    ?>
                    </select>
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="int">Lokasi <?php echo form_error('Id_Lokasi') ?></label></div>
        <div class="col-75">
        <select name='Id_Lokasi' data-placeholder="Pilih Lokasi.." class="form-control">
                    <?php                  
                    $query = $this->db->query('SELECT * FROM lokasi order by Id_Lokasi asc');
                    $result = $query->result_array();
                   
                    foreach ($result as $r) {
                        if ($r['Id_Lokasi'] == $Id_Lokasi) {
                            echo '<option value="' . $r['Id_Lokasi'] . '" selected= "selected">' . $r['Area'] . " " . $r['Rayon'] . " " . $r['Gardu_Induk'] . '</option>';
                        } else {
                            echo '<option value="' . $r['Id_Lokasi'] . '">' . $r['Area'] . " " . $r['Rayon'] . " " . $r['Gardu_Induk'] . '</option>';
                    }}
                    ?>
                    </select>
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="int">Id Modem <?php echo form_error('Id') ?></label>
            </div>
        <div class="col-75">
        <select name='Id' data-placeholder="Pilih Nama Modem.." class="form-control">
                    <?php                  
                    $query = $this->db->query('SELECT * FROM modem order by Id asc');
                    $result = $query->result_array();
                    
                    foreach ($result as $r) {
                        if ($r['Id'] == $Id) {
                            echo '<option value="' . $r['Id'] . '" selected= "selected">' . $r['Id_Modem']  . '</option>';
                        } else {
                            echo '<option value="' . $r['Id'] . '" >' . $r['Id_Modem']  . '</option>';
                    }
                }
                    ?>
                    </select>
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="int">SIM <?php echo form_error('Id_SIM') ?></label>
            </div>
        <div class="col-75">
        <select name='Id_SIM' data-placeholder="Pilih Nama SIM.." class="form-control">
                    <?php                  
                    $query = $this->db->query('SELECT * FROM sim_card order by Id_SIM asc');
                    $result = $query->result_array();
                    
                    foreach ($result as $r) {
                        if ($r['Id_SIM'] == $Id_SIM) {
                            echo '<option value="' . $r['Id_SIM'] . '" selected= "selected">' . $r['Provider'] . " " . $r['IP_SIM'] . '</option>';
                        } else {
                            echo '<option value="' . $r['Id_SIM'] . '" >' . $r['Provider'] . " " . $r['IP_SIM'] . '</option>';
                    }}
                    ?>
                    </select>
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="int">Switch Gear <?php echo form_error('Id_Status_Switch_Gear') ?></label></div>
        <div class="col-75">
        <select name='Id_Status_Switch_Gear' data-placeholder="Pilih Switch Gear.." class="form-control">
                    <?php                  
                    $query = $this->db->query('SELECT * FROM switch_gear order by Id_Status_Switch_Gear asc');
                    $result = $query->result_array();
                    
                    foreach ($result as $r) {
                        if ($r['Id_Status_Switch_Gear'] == $Id_Status_Switch_Gear) {
                            echo '<option value="' . $r['Id_Status_Switch_Gear'] . '" selected= "selected">' . $r['Status_Switch_Gear'] . " " . $r['Penyulang1'] . " " . $r['Penyulang2'] . '</option>';
                        } else {
                            echo '<option value="' . $r['Id_Status_Switch_Gear'] . '" >' . $r['Status_Switch_Gear'] . " " . $r['Penyulang1'] . " " . $r['Penyulang2'] . '</option>';
                    }}
                    ?>
                    </select>
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="enum">Status Akhir <?php echo form_error('Status_Akhir') ?></label>
            </div>
        <div class="col-75">
        <select name='Status_Akhir' data-placeholder="Pilih Switch Gear.." class="form-control">
                   
                    <option value="Normal" <?=$Status_Akhir=="Normal"?' selected="selected"':''?>>Normal</option>
                    <option value="Pending" <?=$Status_Akhir=="Pending"?' selected="selected"':''?>>Pending</option>
                    <option value="Karantina" <?=$Status_Akhir=="Karantina"?' selected="selected"':''?>>Karantina</option>
                    <option value="Modem Bongkar" <?=$Status_Akhir=="Modem Bongkar"?' selected="selected"':''?>>Modem Bongkar</option>
                    
                    </select>
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="enum">Kesiapan Peralatan <?php echo form_error('Kesiapan_Peralatan') ?></label>
            </div>
        <div class="col-75">
        <select name='Kesiapan_Peralatan' data-placeholder="Siap atau Tidak Siap.." class="form-control">
                    <option value="Siap" <?=$Status_Akhir=="Siap"?' selected="selected"':''?>>Siap</option>
                    <option value="Tidak Siap" <?=$Status_Akhir=="Tidak Siap"?' selected="selected"':''?>>Tidak Siap</option>
                   
                    </select>
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="enum">Titik Terpelihara <?php echo form_error('Titik_Terpelihara') ?></label>
            </div>
        <div class="col-75">
        <select name='Titik_Terpelihara' data-placeholder="Titik terpelihara.." class="form-control">
                    <option value="1" <?=$Status_Akhir=="1"?' selected="selected"':''?>>1</option>
                    <option value="0" <?=$Status_Akhir=="0"?' selected="selected"':''?>>0</option>
                    </select>
        </div></div>
        <div class="row">
      <div class="col-25">
            <label for="date">TGL PERGANTIAN BATERAI <?php echo form_error('TGL_PERGANTIAN_BATERAI') ?></label>
            </div>
      <div class="col-75">
            <input type="date" name="TGL_PERGANTIAN_BATERAI" id="TGL_PERGANTIAN_BATERAI" placeholder="TGL PERGANTIAN BATERAI" value="<?php echo $TGL_PERGANTIAN_BATERAI; ?>" /> 
            
        </div>
        </div>
	    <div class="row">
        <div class="col-25">
            <label for="date">TGL HAR TERAKHIR <?php echo form_error('TGL_HAR_TERAKHIR') ?></label>
            </div>
        <div class="col-75">
            <input type="date"  name="TGL_HAR_TERAKHIR" id="TGL_HAR_TERAKHIR" placeholder="TGL HAR TERAKHIR" value="<?php echo $TGL_HAR_TERAKHIR; ?>" />
        </div></div>
	    <div class="row">
        <div class="col-25">
            <label for="Keterangan">Keterangan <?php echo form_error('Keterangan') ?></label>
            </div>
        <div class="col-75">
            <textarea class="form-control" rows="3" name="Keterangan" id="Keterangan" placeholder="Keterangan"><?php echo $Keterangan; ?></textarea>
            </div></div>
	    <input type="hidden" name="Id_Pemeliharaan" value="<?php echo $Id_Pemeliharaan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pemeliharaan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
    </body>
</html>