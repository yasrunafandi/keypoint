<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gembok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
			redirect('login'); }
        $this->load->model('Gembok_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'gembok/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'gembok/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'gembok/index.html';
            $config['first_url'] = base_url() . 'gembok/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Gembok_model->total_rows($q);
        $gembok = $this->Gembok_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'gembok_data' => $gembok,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('gembok/gembok_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Gembok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_Gembok' => $row->Id_Gembok,
		'Gembok_Panel' => $row->Gembok_Panel,
	    );
            $this->load->view('gembok/gembok_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gembok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('gembok/create_action'),
	    'Id_Gembok' => set_value('Id_Gembok'),
	    'Gembok_Panel' => set_value('Gembok_Panel'),
	);
        $this->load->view('gembok/gembok_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Gembok_Panel' => $this->input->post('Gembok_Panel',TRUE),
	    );

            $this->Gembok_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('gembok'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gembok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('gembok/update_action'),
		'Id_Gembok' => set_value('Id_Gembok', $row->Id_Gembok),
		'Gembok_Panel' => set_value('Gembok_Panel', $row->Gembok_Panel),
	    );
            $this->load->view('gembok/gembok_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gembok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_Gembok', TRUE));
        } else {
            $data = array(
		'Gembok_Panel' => $this->input->post('Gembok_Panel',TRUE),
	    );

            $this->Gembok_model->update($this->input->post('Id_Gembok', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('gembok'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Gembok_model->get_by_id($id);

        if ($row) {
            $this->Gembok_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gembok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gembok'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Gembok_Panel', 'gembok panel', 'trim|required');

	$this->form_validation->set_rules('Id_Gembok', 'Id_Gembok', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "gembok.xls";
        $judul = "gembok";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Gembok Panel");

	foreach ($this->Gembok_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Gembok_Panel);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=gembok.doc");

        $data = array(
            'gembok_data' => $this->Gembok_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('gembok/gembok_doc',$data);
    }

}

/* End of file Gembok.php */
/* Location: ./application/controllers/Gembok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-18 18:55:21 */
/* http://harviacode.com */