<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager_model extends CI_Model
{

    public $table = 'v_pemeliharaan';
    public $id = 'Id_Pemeliharaan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

        // get all
       // function get_all($area="all")
        function get_all()
        {
            // if ($area!="all"){
            //     $this->db->where('Area', $area);
            // }
            $this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
        }
         
        //cetak excel
        function get_all_excel($area="all")
         {
             if ($area!="all"){
                 $this->db->where('Area', $area);
             }
             $this->db->order_by($this->id, $this->order);
             return $this->db->get($this->table)->result();
         }

            // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
        // get total rows
        function total_rows($q = NULL) {
        $this->db->like('Id_Pemeliharaan', $q);
        $this->db->or_like('Area', $q);
        $this->db->or_like('Rayon', $q);
        $this->db->or_like('Gardu_Induk', $q);
        $this->db->or_like('Penyulang1', $q);
        $this->db->or_like('Penyulang2', $q);
        $this->db->or_like('Status_Switch_Gear', $q);
        $this->db->or_like('Nama_Keypoint_Dilokasi', $q);
        $this->db->or_like('Nama_Keypoint_Discada', $q);
        $this->db->or_like('idmodem', $q);
        $this->db->or_like('Nama_Gatway', $q);
        $this->db->or_like('Ip_Gatway', $q);
        $this->db->or_like('GPS', $q);
        $this->db->or_like('Alamat_Keypoint', $q);
        $this->db->or_like('Jenis_Keypoint', $q);
        $this->db->or_like('Type_Modem', $q);
        $this->db->or_like('No_IMEI_SN', $q);
        $this->db->or_like('Ip_Modem', $q);
        $this->db->or_like('Merk_RTU', $q);
        $this->db->or_like('No_Seri_RTU', $q);
        $this->db->or_like('Provider', $q);
        $this->db->or_like('Ip_SIM', $q);
        $this->db->or_like('No_SIM', $q);
        $this->db->or_like('No_ICCID', $q);
        $this->db->or_like('Merk', $q);
        $this->db->or_like('Kapasitas', $q);
        $this->db->or_like('Jumlah', $q);
        $this->db->or_like('TGL_PERGANTIAN_BATERAI', $q);
        $this->db->or_like('Gembok_Panel', $q);
        $this->db->or_like('TGL_HAR_TERAKHIR', $q);
        $this->db->or_like('Status_Akhir', $q);
        $this->db->or_like('Kesiapan_Peralatan', $q);
        $this->db->or_like('Keterangan', $q);
        $this->db->or_like('Titik_Terpelihara', $q);
        $this->db->from($this->table);
            return $this->db->count_all_results();
        }
    
         // get data with limit and search
    function get_limit_data($area="all",$limit, $start = 0, $q = NULL) {
        
        $this->db->order_by($this->id, $this->order);
        $this->db->group_start();
        $this->db->like('Id_Pemeliharaan', $q);
        $this->db->or_like('Area', $q);
        $this->db->or_like('Rayon', $q);
        $this->db->or_like('Gardu_Induk', $q);
        $this->db->or_like('Penyulang1', $q);
        $this->db->or_like('Penyulang2', $q);
        $this->db->or_like('Status_Switch_Gear', $q);
        $this->db->or_like('Nama_Keypoint_Dilokasi', $q);
        $this->db->or_like('Nama_Keypoint_Discada', $q);
        $this->db->or_like('idmodem', $q);
        $this->db->or_like('Nama_Gatway', $q);
        $this->db->or_like('Ip_Gatway', $q);
        $this->db->or_like('GPS', $q);
        $this->db->or_like('Alamat_Keypoint', $q);
        $this->db->or_like('Jenis_Keypoint', $q);
        $this->db->or_like('Type_Modem', $q);
        $this->db->or_like('No_IMEI_SN', $q);
        $this->db->or_like('Ip_Modem', $q);
        $this->db->or_like('Merk_RTU', $q);
        $this->db->or_like('No_Seri_RTU', $q);
        $this->db->or_like('Provider', $q);
        $this->db->or_like('Ip_SIM', $q);
        $this->db->or_like('No_SIM', $q);
        $this->db->or_like('No_ICCID', $q);
        $this->db->or_like('Merk', $q);
        $this->db->or_like('Kapasitas', $q);
        $this->db->or_like('Jumlah', $q);
        $this->db->or_like('TGL_PERGANTIAN_BATERAI', $q);
        $this->db->or_like('Gembok_Panel', $q);
        $this->db->or_like('TGL_HAR_TERAKHIR', $q);
        $this->db->or_like('Status_Akhir', $q);
        $this->db->or_like('Kesiapan_Peralatan', $q);
        $this->db->or_like('Keterangan', $q);
        $this->db->or_like('Titik_Terpelihara', $q);
        $this->db->group_end();
        if ($area!="all"){
            $this->db->where('Area', $area);
        }
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }



    function get_search_data($limit, $start = 0, $q = NULL) {
        
        $this->db->order_by($this->id, $this->order);
        $this->db->like('Id_Pemeliharaan', $q);
        $this->db->or_like('Area', $q);
        $this->db->or_like('Rayon', $q);
        $this->db->or_like('Gardu_Induk', $q);
        $this->db->or_like('Penyulang1', $q);
        $this->db->or_like('Penyulang2', $q);
        $this->db->or_like('Status_Switch_Gear', $q);
        $this->db->or_like('Nama_Keypoint_Dilokasi', $q);
        $this->db->or_like('Nama_Keypoint_Discada', $q);
        $this->db->or_like('idmodem', $q);
        $this->db->or_like('Nama_Gatway', $q);
        $this->db->or_like('Ip_Gatway', $q);
        $this->db->or_like('GPS', $q);
        $this->db->or_like('Alamat_Keypoint', $q);
        $this->db->or_like('Jenis_Keypoint', $q);
        $this->db->or_like('Type_Modem', $q);
        $this->db->or_like('No_IMEI_SN', $q);
        $this->db->or_like('Ip_Modem', $q);
        $this->db->or_like('Merk_RTU', $q);
        $this->db->or_like('No_Seri_RTU', $q);
        $this->db->or_like('Provider', $q);
        $this->db->or_like('Ip_SIM', $q);
        $this->db->or_like('No_SIM', $q);
        $this->db->or_like('No_ICCID', $q);
        $this->db->or_like('Merk', $q);
        $this->db->or_like('Kapasitas', $q);
        $this->db->or_like('Jumlah', $q);
        $this->db->or_like('TGL_PERGANTIAN_BATERAI', $q);
        $this->db->or_like('Gembok_Panel', $q);
        $this->db->or_like('TGL_HAR_TERAKHIR', $q);
        $this->db->or_like('Status_Akhir', $q);
        $this->db->or_like('Kesiapan_Peralatan', $q);
        $this->db->or_like('Keterangan', $q);
        $this->db->or_like('Titik_Terpelihara', $q);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

}

?>