<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Switch_gear extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
			redirect('login'); }
        $this->load->model('Switch_gear_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'switch_gear/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'switch_gear/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'switch_gear/index.html';
            $config['first_url'] = base_url() . 'switch_gear/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Switch_gear_model->total_rows($q);
        $switch_gear = $this->Switch_gear_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'switch_gear_data' => $switch_gear,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('switch_gear/switch_gear_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Switch_gear_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_Status_Switch_Gear' => $row->Id_Status_Switch_Gear,
		'Status_Switch_Gear' => $row->Status_Switch_Gear,
		'Penyulang1' => $row->Penyulang1,
		'Penyulang2' => $row->Penyulang2,
	    );
            $this->load->view('switch_gear/switch_gear_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('switch_gear'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('switch_gear/create_action'),
	    'Id_Status_Switch_Gear' => set_value('Id_Status_Switch_Gear'),
	    'Status_Switch_Gear' => set_value('Status_Switch_Gear'),
	    'Penyulang1' => set_value('Penyulang1'),
	    'Penyulang2' => set_value('Penyulang2'),
	);
        $this->load->view('switch_gear/switch_gear_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Status_Switch_Gear' => $this->input->post('Status_Switch_Gear',TRUE),
		'Penyulang1' => $this->input->post('Penyulang1',TRUE),
		'Penyulang2' => $this->input->post('Penyulang2',TRUE),
	    );

            $this->Switch_gear_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('switch_gear'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Switch_gear_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('switch_gear/update_action'),
		'Id_Status_Switch_Gear' => set_value('Id_Status_Switch_Gear', $row->Id_Status_Switch_Gear),
		'Status_Switch_Gear' => set_value('Status_Switch_Gear', $row->Status_Switch_Gear),
		'Penyulang1' => set_value('Penyulang1', $row->Penyulang1),
		'Penyulang2' => set_value('Penyulang2', $row->Penyulang2),
	    );
            $this->load->view('switch_gear/switch_gear_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('switch_gear'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_Status_Switch_Gear', TRUE));
        } else {
            $data = array(
		'Status_Switch_Gear' => $this->input->post('Status_Switch_Gear',TRUE),
		'Penyulang1' => $this->input->post('Penyulang1',TRUE),
		'Penyulang2' => $this->input->post('Penyulang2',TRUE),
	    );

            $this->Switch_gear_model->update($this->input->post('Id_Status_Switch_Gear', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('switch_gear'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Switch_gear_model->get_by_id($id);

        if ($row) {
            $this->Switch_gear_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('switch_gear'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('switch_gear'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Status_Switch_Gear', 'status switch gear', 'trim|required');
	$this->form_validation->set_rules('Penyulang1', 'penyulang1', 'trim|required');
	$this->form_validation->set_rules('Penyulang2', 'penyulang2', 'trim|required');

	$this->form_validation->set_rules('Id_Status_Switch_Gear', 'Id_Status_Switch_Gear', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "switch_gear.xls";
        $judul = "switch_gear";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Status Switch Gear");
	xlsWriteLabel($tablehead, $kolomhead++, "Penyulang1");
	xlsWriteLabel($tablehead, $kolomhead++, "Penyulang2");

	foreach ($this->Switch_gear_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Status_Switch_Gear);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Penyulang1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Penyulang2);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=switch_gear.doc");

        $data = array(
            'switch_gear_data' => $this->Switch_gear_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('switch_gear/switch_gear_doc',$data);
    }

}

/* End of file Switch_gear.php */
/* Location: ./application/controllers/Switch_gear.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-18 18:55:21 */
/* http://harviacode.com */