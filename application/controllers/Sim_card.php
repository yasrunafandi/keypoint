<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sim_card extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
			redirect('login'); }
        $this->load->model('Sim_card_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sim_card/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sim_card/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sim_card/index.html';
            $config['first_url'] = base_url() . 'sim_card/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sim_card_model->total_rows($q);
        $sim_card = $this->Sim_card_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sim_card_data' => $sim_card,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('sim_card/sim_card_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sim_card_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_SIM' => $row->Id_SIM,
		'Provider' => $row->Provider,
		'IP_SIM' => $row->IP_SIM,
		'No_SIM' => $row->No_SIM,
		'No_ICCID' => $row->No_ICCID,
	    );
            $this->load->view('sim_card/sim_card_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sim_card'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sim_card/create_action'),
	    'Id_SIM' => set_value('Id_SIM'),
	    'Provider' => set_value('Provider'),
	    'IP_SIM' => set_value('IP_SIM'),
	    'No_SIM' => set_value('No_SIM'),
	    'No_ICCID' => set_value('No_ICCID'),
	);
        $this->load->view('sim_card/sim_card_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Provider' => $this->input->post('Provider',TRUE),
		'IP_SIM' => $this->input->post('IP_SIM',TRUE),
		'No_SIM' => $this->input->post('No_SIM',TRUE),
		'No_ICCID' => $this->input->post('No_ICCID',TRUE),
	    );

            $this->Sim_card_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sim_card'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sim_card_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sim_card/update_action'),
		'Id_SIM' => set_value('Id_SIM', $row->Id_SIM),
		'Provider' => set_value('Provider', $row->Provider),
		'IP_SIM' => set_value('IP_SIM', $row->IP_SIM),
		'No_SIM' => set_value('No_SIM', $row->No_SIM),
		'No_ICCID' => set_value('No_ICCID', $row->No_ICCID),
	    );
            $this->load->view('sim_card/sim_card_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sim_card'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_SIM', TRUE));
        } else {
            $data = array(
		'Provider' => $this->input->post('Provider',TRUE),
		'IP_SIM' => $this->input->post('IP_SIM',TRUE),
		'No_SIM' => $this->input->post('No_SIM',TRUE),
		'No_ICCID' => $this->input->post('No_ICCID',TRUE),
	    );

            $this->Sim_card_model->update($this->input->post('Id_SIM', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sim_card'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sim_card_model->get_by_id($id);

        if ($row) {
            $this->Sim_card_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sim_card'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sim_card'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Provider', 'provider', 'trim|required');
	$this->form_validation->set_rules('IP_SIM', 'ip sim', 'trim|required');
	$this->form_validation->set_rules('No_SIM', 'no sim', 'trim|required');
	$this->form_validation->set_rules('No_ICCID', 'no iccid', 'trim|required');

	$this->form_validation->set_rules('Id_SIM', 'Id_SIM', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sim_card.xls";
        $judul = "sim_card";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Provider");
	xlsWriteLabel($tablehead, $kolomhead++, "IP SIM");
	xlsWriteLabel($tablehead, $kolomhead++, "No SIM");
	xlsWriteLabel($tablehead, $kolomhead++, "No ICCID");

	foreach ($this->Sim_card_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Provider);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IP_SIM);
	    xlsWriteLabel($tablebody, $kolombody++, $data->No_SIM);
	    xlsWriteNumber($tablebody, $kolombody++, $data->No_ICCID);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sim_card.doc");

        $data = array(
            'sim_card_data' => $this->Sim_card_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sim_card/sim_card_doc',$data);
    }

}

/* End of file Sim_card.php */
/* Location: ./application/controllers/Sim_card.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-18 18:55:21 */
/* http://harviacode.com */