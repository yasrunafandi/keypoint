<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
			redirect('login'); }
        $this->load->model('Pemeliharaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        //$keypoint = urldecode($this->input->get('keypoint', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemeliharaan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemeliharaan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemeliharaan/index.html';
            $config['first_url'] = base_url() . 'pemeliharaan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemeliharaan_model->total_rows($q);
        // $pemeliharaan = $this->Pemeliharaan_model->get_limit_data($config['per_page'], $start, $q);
        $pemeliharaan = $this->Pemeliharaan_model->get_limit_data2($q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemeliharaan_data' => $pemeliharaan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pemeliharaan/pemeliharaan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pemeliharaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_Pemeliharaan' => $row->Id_Pemeliharaan,
		'Id_Keypoint' => $row->Id_Keypoint,
		'Id_Baterai' => $row->Id_Baterai,
		'Id_Gatway' => $row->Id_Gatway,
		'Id_Gembok' => $row->Id_Gembok,
		'Id_Lokasi' => $row->Id_Lokasi,
		'Id' => $row->Id,
		'Id_SIM' => $row->Id_SIM,
		'Id_Status_Switch_Gear' => $row->Id_Status_Switch_Gear,
		'Status_Akhir' => $row->Status_Akhir,
		'Kesiapan_Peralatan' => $row->Kesiapan_Peralatan,
        'Titik_Terpelihara' => $row->Titik_Terpelihara,
        'TGL_PERGANTIAN_BATERAI' => $row->TGL_PERGANTIAN_BATERAI,
		'TGL_HAR_TERAKHIR' => $row->TGL_HAR_TERAKHIR,
		'Keterangan' => $row->Keterangan,
	    );
            $this->load->view('pemeliharaan/pemeliharaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeliharaan'));
        }
    }
    public function maps()
    {
        $this->load->view('pemeliharaan/pemeliharaan_maps', $data);
    }
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemeliharaan/create_action'),
	    'Id_Pemeliharaan' => set_value('Id_Pemeliharaan'),
	    'Id_Keypoint' => set_value('Id_Keypoint'),
	    'Id_Baterai' => set_value('Id_Baterai'),
	    'Id_Gatway' => set_value('Id_Gatway'),
	    'Id_Gembok' => set_value('Id_Gembok'),
	    'Id_Lokasi' => set_value('Id_Lokasi'),
	    'Id' => set_value('Id'),
	    'Id_SIM' => set_value('Id_SIM'),
	    'Id_Status_Switch_Gear' => set_value('Id_Status_Switch_Gear'),
	    'Status_Akhir' => set_value('Status_Akhir'),
	    'Kesiapan_Peralatan' => set_value('Kesiapan_Peralatan'),
        'Titik_Terpelihara' => set_value('Titik_Terpelihara'),
        'TGL_PERGANTIAN_BATERAI' => set_value('TGL_PERGANTIAN_BATERAI'),
	    'TGL_HAR_TERAKHIR' => set_value('TGL_HAR_TERAKHIR'),
	    'Keterangan' => set_value('Keterangan'),
	);
        $this->load->view('pemeliharaan/pemeliharaan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Id_Keypoint' => $this->input->post('Id_Keypoint',TRUE),
		'Id_Baterai' => $this->input->post('Id_Baterai',TRUE),
		'Id_Gatway' => $this->input->post('Id_Gatway',TRUE),
		'Id_Gembok' => $this->input->post('Id_Gembok',TRUE),
		'Id_Lokasi' => $this->input->post('Id_Lokasi',TRUE),
		'Id' => $this->input->post('Id',TRUE),
		'Id_SIM' => $this->input->post('Id_SIM',TRUE),
		'Id_Status_Switch_Gear' => $this->input->post('Id_Status_Switch_Gear',TRUE),
		'Status_Akhir' => $this->input->post('Status_Akhir',TRUE),
		'Kesiapan_Peralatan' => $this->input->post('Kesiapan_Peralatan',TRUE),
        'Titik_Terpelihara' => $this->input->post('Titik_Terpelihara',TRUE),
        'TGL_PERGANTIAN_BATERAI' => $this->input->post('TGL_PERGANTIAN_BATERAI',TRUE),
		'TGL_HAR_TERAKHIR' => $this->input->post('TGL_HAR_TERAKHIR',TRUE),
		'Keterangan' => $this->input->post('Keterangan',TRUE),
	    );

            $this->Pemeliharaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pemeliharaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemeliharaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemeliharaan/update_action'),
		'Id_Pemeliharaan' => set_value('Id_Pemeliharaan', $row->Id_Pemeliharaan),
		'Id_Keypoint' => set_value('Id_Keypoint', $row->Id_Keypoint),
		'Id_Baterai' => set_value('Id_Baterai', $row->Id_Baterai),
		'Id_Gatway' => set_value('Id_Gatway', $row->Id_Gatway),
		'Id_Gembok' => set_value('Id_Gembok', $row->Id_Gembok),
		'Id_Lokasi' => set_value('Id_Lokasi', $row->Id_Lokasi),
		'Id' => set_value('Id', $row->Id),
		'Id_SIM' => set_value('Id_SIM', $row->Id_SIM),
		'Id_Status_Switch_Gear' => set_value('Id_Status_Switch_Gear', $row->Id_Status_Switch_Gear),
		'Status_Akhir' => set_value('Status_Akhir', $row->Status_Akhir),
		'Kesiapan_Peralatan' => set_value('Kesiapan_Peralatan', $row->Kesiapan_Peralatan),
        'Titik_Terpelihara' => set_value('Titik_Terpelihara', $row->Titik_Terpelihara),
        'TGL_PERGANTIAN_BATERAI' => set_value('TGL_PERGANTIAN_BATERAI', $row->TGL_PERGANTIAN_BATERAI),
		'TGL_HAR_TERAKHIR' => set_value('TGL_HAR_TERAKHIR', $row->TGL_HAR_TERAKHIR),
		'Keterangan' => set_value('Keterangan', $row->Keterangan),
	    );
            $this->load->view('pemeliharaan/pemeliharaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeliharaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_Pemeliharaan', TRUE));
        } else {
            $data = array(
		'Id_Keypoint' => $this->input->post('Id_Keypoint',TRUE),
		'Id_Baterai' => $this->input->post('Id_Baterai',TRUE),
		'Id_Gatway' => $this->input->post('Id_Gatway',TRUE),
		'Id_Gembok' => $this->input->post('Id_Gembok',TRUE),
		'Id_Lokasi' => $this->input->post('Id_Lokasi',TRUE),
		'Id' => $this->input->post('Id',TRUE),
		'Id_SIM' => $this->input->post('Id_SIM',TRUE),
		'Id_Status_Switch_Gear' => $this->input->post('Id_Status_Switch_Gear',TRUE),
		'Status_Akhir' => $this->input->post('Status_Akhir',TRUE),
		'Kesiapan_Peralatan' => $this->input->post('Kesiapan_Peralatan',TRUE),
        'Titik_Terpelihara' => $this->input->post('Titik_Terpelihara',TRUE),
        'TGL_PERGANTIAN_BATERAI' => $this->input->post('TGL_PERGANTIAN_BATERAI',TRUE),
		'TGL_HAR_TERAKHIR' => $this->input->post('TGL_HAR_TERAKHIR',TRUE),
		'Keterangan' => $this->input->post('Keterangan',TRUE),
	    );

            $this->Pemeliharaan_model->update($this->input->post('Id_Pemeliharaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pemeliharaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemeliharaan_model->get_by_id($id);

        if ($row) {
            $this->Pemeliharaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemeliharaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeliharaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Id_Keypoint', 'id keypoint', 'trim|required');
	$this->form_validation->set_rules('Id_Baterai', 'id baterai', 'trim|required');
	$this->form_validation->set_rules('Id_Gatway', 'id gatway', 'trim|required');
	$this->form_validation->set_rules('Id_Gembok', 'id gembok', 'trim|required');
	$this->form_validation->set_rules('Id_Lokasi', 'id lokasi', 'trim|required');
	$this->form_validation->set_rules('Id', 'id', 'trim|required');
	$this->form_validation->set_rules('Id_SIM', 'id sim', 'trim|required');
	$this->form_validation->set_rules('Id_Status_Switch_Gear', 'id status switch gear', 'trim|required');
	$this->form_validation->set_rules('Status_Akhir', 'status akhir', 'trim|required');
	$this->form_validation->set_rules('Kesiapan_Peralatan', 'kesiapan peralatan', 'trim|required');
    $this->form_validation->set_rules('Titik_Terpelihara', 'titik terpelihara', 'trim|required');
    $this->form_validation->set_rules('TGL_PERGANTIAN_BATERAI', 'tgl pergantian baterai', 'trim|required');
	$this->form_validation->set_rules('TGL_HAR_TERAKHIR', 'tgl har terakhir', 'trim|required');
	$this->form_validation->set_rules('Keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('Id_Pemeliharaan', 'Id_Pemeliharaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pemeliharaan.xls";
        $judul = "pemeliharaan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Keypoint");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Baterai");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Gatway");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Gembok");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Lokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Id SIM");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Status Switch Gear");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Akhir");
	xlsWriteLabel($tablehead, $kolomhead++, "Kesiapan Peralatan");
    xlsWriteLabel($tablehead, $kolomhead++, "Titik Terpelihara");
    xlsWriteLabel($tablehead, $kolomhead++, "TGL PERGANTIAN BATERAI");
	xlsWriteLabel($tablehead, $kolomhead++, "TGL HAR TERAKHIR");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Pemeliharaan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Id_Keypoint);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Id_Baterai);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Id_Gatway);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Id_Gembok);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Id_Lokasi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Id_SIM);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Id_Status_Switch_Gear);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Status_Akhir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kesiapan_Peralatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Titik_Terpelihara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TGL_HAR_TERAKHIR);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pemeliharaan.doc");

        $data = array(
            'pemeliharaan_data' => $this->Pemeliharaan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pemeliharaan/pemeliharaan_doc',$data);
    }

}

/* End of file Pemeliharaan.php */
/* Location: ./application/controllers/Pemeliharaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-30 17:30:38 */
/* http://harviacode.com */