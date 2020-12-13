<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
            redirect('login'); }
        $this->load->model('Manager_model');
        $this->load->library('form_validation');
    
    }
public function index(){
    $area = urldecode($this->input->get('area', TRUE));
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));
    
    if ($q <> '') {
        $config['base_url'] = base_url() . 'manager/index.html?q=' . urlencode($q);
        $config['first_url'] = base_url() . 'manager/index.html?q=' . urlencode($q);
    } else {
        $config['base_url'] = base_url() . 'manager/index.html';
        $config['first_url'] = base_url() . 'manager/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->Manager_model->total_rows($q);
    //$manager = $this->Manager_model->get_limit_data($area,$config['per_page'], $start, $q);
    $manager = $this->Manager_model->get_search_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
        'manager_data' => $manager,
       // 'manager_search_data' => $manager_search,
        'q' => $q,
        'pagination' => $this->pagination->create_links(),
        'total_rows' => $config['total_rows'],
        'start' => $start,
    );
$this->load->view('manager/manager_list',$data);
}

//mencari berdasarkan area
public function area(){
    $area = urldecode($this->input->get('area', TRUE));
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));
    
    if ($q <> '') {
        $config['base_url'] = base_url() . 'manager/index.html?q=' . urlencode($q);
        $config['first_url'] = base_url() . 'manager/index.html?q=' . urlencode($q);
    } else {
        $config['base_url'] = base_url() . 'manager/index.html';
        $config['first_url'] = base_url() . 'manager/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->Manager_model->total_rows($q);
    $manager = $this->Manager_model->get_limit_data($area,$config['per_page'], $start, $q);
    //$manager = $this->Manager_model->get_search_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
        'manager_data' => $manager,
        //'manager_search_data' => $manager_search,
        'q' => $q,
        'pagination' => $this->pagination->create_links(),
        'total_rows' => $config['total_rows'],
        'start' => $start,
    );
$this->load->view('manager/manager_list',$data);
}


public function excel($area)
    {
        $this->load->helper('exportexcel');
        $namaFile = "manager.xls";
        $judul = "manager";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Area");
	xlsWriteLabel($tablehead, $kolomhead++, "Rayon");
    xlsWriteLabel($tablehead, $kolomhead++, "Gardu_Induk");
    xlsWriteLabel($tablehead, $kolomhead++, "Penyulang1");
    xlsWriteLabel($tablehead, $kolomhead++, "Penyulang2");
    xlsWriteLabel($tablehead, $kolomhead++, "Status_Switch_Gear");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama_Keypoint_Dilokasi");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama_Keypoint_Discada");
    xlsWriteLabel($tablehead, $kolomhead++, "idmodem");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama_Gatway");
    xlsWriteLabel($tablehead, $kolomhead++, "Ip_Gatway");
    xlsWriteLabel($tablehead, $kolomhead++, "GPS");
    xlsWriteLabel($tablehead, $kolomhead++, "Alamat_Keypoint");
    xlsWriteLabel($tablehead, $kolomhead++, "Jenis_Keypoint");
    xlsWriteLabel($tablehead, $kolomhead++, "Type_Modem");
    xlsWriteLabel($tablehead, $kolomhead++, "No_IMEI_SN");
    xlsWriteLabel($tablehead, $kolomhead++, "Ip_Modem");
    xlsWriteLabel($tablehead, $kolomhead++, "Merk_RTU");
    xlsWriteLabel($tablehead, $kolomhead++, "No_Seri_RTU");
    xlsWriteLabel($tablehead, $kolomhead++, "Provider");
    xlsWriteLabel($tablehead, $kolomhead++, "Ip_SIM");
    xlsWriteLabel($tablehead, $kolomhead++, "No_SIM");
    xlsWriteLabel($tablehead, $kolomhead++, "No_ICCID");
    xlsWriteLabel($tablehead, $kolomhead++, "Merk");
    xlsWriteLabel($tablehead, $kolomhead++, "Kapasitas");
    xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
    xlsWriteLabel($tablehead, $kolomhead++, "TGL_PERGANTIAN_BATERAI");
    xlsWriteLabel($tablehead, $kolomhead++, "Gembok_Panel");
    xlsWriteLabel($tablehead, $kolomhead++, "TGL_HAR_TERAKHIR");
    xlsWriteLabel($tablehead, $kolomhead++, "Status_Akhir");
    xlsWriteLabel($tablehead, $kolomhead++, "Kesiapan_Peralatan");
    xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
    xlsWriteLabel($tablehead, $kolomhead++, "Titik_Terpelihara");

	foreach ($this->Manager_model->get_all_excel($area) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Area);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Rayon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Gardu_Induk);
        xlsWriteLabel($tablebody, $kolombody++, $data->Penyulang1);
        xlsWriteLabel($tablebody, $kolombody++, $data->Penyulang2);
        xlsWriteLabel($tablebody, $kolombody++, $data->Status_Switch_Gear);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Keypoint_Dilokasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Keypoint_Discada);
	    xlsWriteLabel($tablebody, $kolombody++, $data->idmodem);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Gatway);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Ip_Gatway);
	    xlsWriteLabel($tablebody, $kolombody++, $data->GPS);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Alamat_Keypoint);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jenis_Keypoint);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Type_Modem);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_IMEI_SN);
        xlsWriteLabel($tablebody, $kolombody++, $data->Ip_Modem);
        xlsWriteLabel($tablebody, $kolombody++, $data->Merk_RTU);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_Seri_RTU);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Provider);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Ip_SIM);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_SIM);
        xlsWriteLabel($tablebody, $kolombody++, $data->No_ICCID);
        xlsWriteLabel($tablebody, $kolombody++, $data->Merk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kapasitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TGL_PERGANTIAN_BATERAI);
        xlsWriteLabel($tablebody, $kolombody++, $data->Gembok_Panel);
        xlsWriteLabel($tablebody, $kolombody++, $data->TGL_HAR_TERAKHIR);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Status_Akhir);
        xlsWriteLabel($tablebody, $kolombody++, $data->Kesiapan_Peralatan);
        xlsWriteLabel($tablebody, $kolombody++, $data->Keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Titik_Terpelihara);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=baterai.doc");

        $data = array(
            'manager_data' => $this->Manager_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('manager/manager_doc',$data);
    }



}

?>