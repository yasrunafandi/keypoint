<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modem extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
			redirect('login'); }
        $this->load->model('Modem_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'modem/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'modem/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'modem/index.html';
            $config['first_url'] = base_url() . 'modem/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Modem_model->total_rows($q);
        $modem = $this->Modem_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'modem_data' => $modem,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('modem/modem_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Modem_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id' => $row->Id,
		'Id_Modem' => $row->Id_Modem,
		'Type_Modem' => $row->Type_Modem,
		'No_IMEI_SN' => $row->No_IMEI_SN,
		'IP_Modem' => $row->IP_Modem,
	    );
            $this->load->view('modem/modem_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modem'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('modem/create_action'),
	    'Id' => set_value('Id'),
	    'Id_Modem' => set_value('Id_Modem'),
	    'Type_Modem' => set_value('Type_Modem'),
	    'No_IMEI_SN' => set_value('No_IMEI_SN'),
	    'IP_Modem' => set_value('IP_Modem'),
	);
        $this->load->view('modem/modem_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Id_Modem' => $this->input->post('Id_Modem',TRUE),
		'Type_Modem' => $this->input->post('Type_Modem',TRUE),
		'No_IMEI_SN' => $this->input->post('No_IMEI_SN',TRUE),
		'IP_Modem' => $this->input->post('IP_Modem',TRUE),
	    );

            $this->Modem_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('modem'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Modem_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('modem/update_action'),
		'Id' => set_value('Id', $row->Id),
		'Id_Modem' => set_value('Id_Modem', $row->Id_Modem),
		'Type_Modem' => set_value('Type_Modem', $row->Type_Modem),
		'No_IMEI_SN' => set_value('No_IMEI_SN', $row->No_IMEI_SN),
		'IP_Modem' => set_value('IP_Modem', $row->IP_Modem),
	    );
            $this->load->view('modem/modem_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modem'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id', TRUE));
        } else {
            $data = array(
		'Id_Modem' => $this->input->post('Id_Modem',TRUE),
		'Type_Modem' => $this->input->post('Type_Modem',TRUE),
		'No_IMEI_SN' => $this->input->post('No_IMEI_SN',TRUE),
		'IP_Modem' => $this->input->post('IP_Modem',TRUE),
	    );

            $this->Modem_model->update($this->input->post('Id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('modem'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Modem_model->get_by_id($id);

        if ($row) {
            $this->Modem_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('modem'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('modem'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Id_Modem', 'id modem', 'trim|required');
	$this->form_validation->set_rules('Type_Modem', 'type modem', 'trim|required');
	$this->form_validation->set_rules('No_IMEI_SN', 'no imei sn', 'trim|required');
	$this->form_validation->set_rules('IP_Modem', 'ip modem', 'trim|required');

	$this->form_validation->set_rules('Id', 'Id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "modem.xls";
        $judul = "modem";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Modem");
	xlsWriteLabel($tablehead, $kolomhead++, "Type Modem");
	xlsWriteLabel($tablehead, $kolomhead++, "No IMEI SN");
	xlsWriteLabel($tablehead, $kolomhead++, "IP Modem");

	foreach ($this->Modem_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Id_Modem);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Type_Modem);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_IMEI_SN);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IP_Modem);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=modem.doc");

        $data = array(
            'modem_data' => $this->Modem_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('modem/modem_doc',$data);
    }

}

/* End of file Modem.php */
/* Location: ./application/controllers/Modem.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-18 18:55:21 */
/* http://harviacode.com */