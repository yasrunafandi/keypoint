<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_keypoint extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
			redirect('login'); }
        $this->load->model('Tb_keypoint_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tb_keypoint/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tb_keypoint/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tb_keypoint/index.html';
            $config['first_url'] = base_url() . 'tb_keypoint/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tb_keypoint_model->total_rows($q);
        $tb_keypoint = $this->Tb_keypoint_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tb_keypoint_data' => $tb_keypoint,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tb_keypoint/tb_keypoint_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_keypoint_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_Keypoint' => $row->Id_Keypoint,
		'Nama_Keypoint_Dilokasi' => $row->Nama_Keypoint_Dilokasi,
		'Nama_Keypoint_Discada' => $row->Nama_Keypoint_Discada,
		'Jenis_Keypoint' => $row->Jenis_Keypoint,
		'Merk_RTU' => $row->Merk_RTU,
		'No_Seri_RTU' => $row->No_Seri_RTU,
		'Alamat_Keypoint' => $row->Alamat_Keypoint,
		'GPS' => $row->GPS,
	    );
            $this->load->view('tb_keypoint/tb_keypoint_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_keypoint'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_keypoint/create_action'),
	    'Id_Keypoint' => set_value('Id_Keypoint'),
	    'Nama_Keypoint_Dilokasi' => set_value('Nama_Keypoint_Dilokasi'),
	    'Nama_Keypoint_Discada' => set_value('Nama_Keypoint_Discada'),
	    'Jenis_Keypoint' => set_value('Jenis_Keypoint'),
	    'Merk_RTU' => set_value('Merk_RTU'),
	    'No_Seri_RTU' => set_value('No_Seri_RTU'),
	    'Alamat_Keypoint' => set_value('Alamat_Keypoint'),
	    'GPS' => set_value('GPS'),
	);
        $this->load->view('tb_keypoint/tb_keypoint_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama_Keypoint_Dilokasi' => $this->input->post('Nama_Keypoint_Dilokasi',TRUE),
		'Nama_Keypoint_Discada' => $this->input->post('Nama_Keypoint_Discada',TRUE),
		'Jenis_Keypoint' => $this->input->post('Jenis_Keypoint',TRUE),
		'Merk_RTU' => $this->input->post('Merk_RTU',TRUE),
		'No_Seri_RTU' => $this->input->post('No_Seri_RTU',TRUE),
		'Alamat_Keypoint' => $this->input->post('Alamat_Keypoint',TRUE),
		'GPS' => $this->input->post('GPS',TRUE),
	    );

            $this->Tb_keypoint_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_keypoint'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_keypoint_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_keypoint/update_action'),
		'Id_Keypoint' => set_value('Id_Keypoint', $row->Id_Keypoint),
		'Nama_Keypoint_Dilokasi' => set_value('Nama_Keypoint_Dilokasi', $row->Nama_Keypoint_Dilokasi),
		'Nama_Keypoint_Discada' => set_value('Nama_Keypoint_Discada', $row->Nama_Keypoint_Discada),
		'Jenis_Keypoint' => set_value('Jenis_Keypoint', $row->Jenis_Keypoint),
		'Merk_RTU' => set_value('Merk_RTU', $row->Merk_RTU),
		'No_Seri_RTU' => set_value('No_Seri_RTU', $row->No_Seri_RTU),
		'Alamat_Keypoint' => set_value('Alamat_Keypoint', $row->Alamat_Keypoint),
		'GPS' => set_value('GPS', $row->GPS),
	    );
            $this->load->view('tb_keypoint/tb_keypoint_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_keypoint'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_Keypoint', TRUE));
        } else {
            $data = array(
		'Nama_Keypoint_Dilokasi' => $this->input->post('Nama_Keypoint_Dilokasi',TRUE),
		'Nama_Keypoint_Discada' => $this->input->post('Nama_Keypoint_Discada',TRUE),
		'Jenis_Keypoint' => $this->input->post('Jenis_Keypoint',TRUE),
		'Merk_RTU' => $this->input->post('Merk_RTU',TRUE),
		'No_Seri_RTU' => $this->input->post('No_Seri_RTU',TRUE),
		'Alamat_Keypoint' => $this->input->post('Alamat_Keypoint',TRUE),
		'GPS' => $this->input->post('GPS',TRUE),
	    );

            $this->Tb_keypoint_model->update($this->input->post('Id_Keypoint', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_keypoint'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_keypoint_model->get_by_id($id);

        if ($row) {
            $this->Tb_keypoint_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_keypoint'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_keypoint'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama_Keypoint_Dilokasi', 'nama keypoint dilokasi', 'trim|required');
	$this->form_validation->set_rules('Nama_Keypoint_Discada', 'nama keypoint discada', 'trim|required');
	$this->form_validation->set_rules('Jenis_Keypoint', 'jenis keypoint', 'trim|required');
	$this->form_validation->set_rules('Merk_RTU', 'merk rtu', 'trim|required');
	$this->form_validation->set_rules('No_Seri_RTU', 'no seri rtu', 'trim|required');
	$this->form_validation->set_rules('Alamat_Keypoint', 'alamat keypoint', 'trim|required');
	$this->form_validation->set_rules('GPS', 'gps', 'trim|required');

	$this->form_validation->set_rules('Id_Keypoint', 'Id_Keypoint', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_keypoint.xls";
        $judul = "tb_keypoint";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Keypoint Dilokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Keypoint Discada");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Keypoint");
	xlsWriteLabel($tablehead, $kolomhead++, "Merk RTU");
	xlsWriteLabel($tablehead, $kolomhead++, "No Seri RTU");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Keypoint");
	xlsWriteLabel($tablehead, $kolomhead++, "GPS");

	foreach ($this->Tb_keypoint_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Keypoint_Dilokasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Keypoint_Discada);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jenis_Keypoint);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Merk_RTU);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_Seri_RTU);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Alamat_Keypoint);
	    xlsWriteLabel($tablebody, $kolombody++, $data->GPS);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_keypoint.doc");

        $data = array(
            'tb_keypoint_data' => $this->Tb_keypoint_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_keypoint/tb_keypoint_doc',$data);
    }

}

/* End of file Tb_keypoint.php */
/* Location: ./application/controllers/Tb_keypoint.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-18 18:55:21 */
/* http://harviacode.com */