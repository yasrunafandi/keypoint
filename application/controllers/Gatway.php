<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gatway extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
			redirect('login');}
        $this->load->model('Gatway_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'gatway/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'gatway/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'gatway/index.html';
            $config['first_url'] = base_url() . 'gatway/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Gatway_model->total_rows($q);
        $gatway = $this->Gatway_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'gatway_data' => $gatway,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('gatway/gatway_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Gatway_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_Gatway' => $row->Id_Gatway,
		'Nama_Gatway' => $row->Nama_Gatway,
		'IP_Gatway' => $row->IP_Gatway,
	    );
            $this->load->view('gatway/gatway_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gatway'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('gatway/create_action'),
	    'Id_Gatway' => set_value('Id_Gatway'),
	    'Nama_Gatway' => set_value('Nama_Gatway'),
	    'IP_Gatway' => set_value('IP_Gatway'),
	);
        $this->load->view('gatway/gatway_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama_Gatway' => $this->input->post('Nama_Gatway',TRUE),
		'IP_Gatway' => $this->input->post('IP_Gatway',TRUE),
	    );

            $this->Gatway_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('gatway'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gatway_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('gatway/update_action'),
		'Id_Gatway' => set_value('Id_Gatway', $row->Id_Gatway),
		'Nama_Gatway' => set_value('Nama_Gatway', $row->Nama_Gatway),
		'IP_Gatway' => set_value('IP_Gatway', $row->IP_Gatway),
	    );
            $this->load->view('gatway/gatway_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gatway'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_Gatway', TRUE));
        } else {
            $data = array(
		'Nama_Gatway' => $this->input->post('Nama_Gatway',TRUE),
		'IP_Gatway' => $this->input->post('IP_Gatway',TRUE),
	    );

            $this->Gatway_model->update($this->input->post('Id_Gatway', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('gatway'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Gatway_model->get_by_id($id);

        if ($row) {
            $this->Gatway_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gatway'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gatway'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama_Gatway', 'nama gatway', 'trim|required');
	$this->form_validation->set_rules('IP_Gatway', 'ip gatway', 'trim|required');

	$this->form_validation->set_rules('Id_Gatway', 'Id_Gatway', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "gatway.xls";
        $judul = "gatway";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Gatway");
	xlsWriteLabel($tablehead, $kolomhead++, "IP Gatway");

	foreach ($this->Gatway_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama_Gatway);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IP_Gatway);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=gatway.doc");

        $data = array(
            'gatway_data' => $this->Gatway_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('gatway/gatway_doc',$data);
    }

}

/* End of file Gatway.php */
/* Location: ./application/controllers/Gatway.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-18 18:55:21 */
/* http://harviacode.com */