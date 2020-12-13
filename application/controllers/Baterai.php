<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baterai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
            redirect('login'); }
        $this->load->model('Baterai_model');
        $this->load->library('form_validation');
    
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'baterai/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'baterai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'baterai/index.html';
            $config['first_url'] = base_url() . 'baterai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Baterai_model->total_rows($q);
        $baterai = $this->Baterai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'baterai_data' => $baterai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('baterai/baterai_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Baterai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_Baterai' => $row->Id_Baterai,
		'Merk' => $row->Merk,
		'Kapasitas' => $row->Kapasitas,
		'Jumlah' => $row->Jumlah,
	    );
            $this->load->view('baterai/baterai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('baterai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('baterai/create_action'),
	    'Id_Baterai' => set_value('Id_Baterai'),
	    'Merk' => set_value('Merk'),
	    'Kapasitas' => set_value('Kapasitas'),
	    'Jumlah' => set_value('Jumlah'),
	);
        $this->load->view('baterai/baterai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Merk' => $this->input->post('Merk',TRUE),
		'Kapasitas' => $this->input->post('Kapasitas',TRUE),
		'Jumlah' => $this->input->post('Jumlah',TRUE),
	    );

            $this->Baterai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('baterai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Baterai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('baterai/update_action'),
		'Id_Baterai' => set_value('Id_Baterai', $row->Id_Baterai),
		'Merk' => set_value('Merk', $row->Merk),
		'Kapasitas' => set_value('Kapasitas', $row->Kapasitas),
		'Jumlah' => set_value('Jumlah', $row->Jumlah),
	    );
            $this->load->view('baterai/baterai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('baterai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_Baterai', TRUE));
        } else {
            $data = array(
		'Merk' => $this->input->post('Merk',TRUE),
		'Kapasitas' => $this->input->post('Kapasitas',TRUE),
		'Jumlah' => $this->input->post('Jumlah',TRUE),
	    );

            $this->Baterai_model->update($this->input->post('Id_Baterai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('baterai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Baterai_model->get_by_id($id);

        if ($row) {
            $this->Baterai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('baterai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('baterai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Merk', 'merk', 'trim|required');
	$this->form_validation->set_rules('Kapasitas', 'kapasitas', 'trim|required');
	$this->form_validation->set_rules('Jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('Id_Baterai', 'Id_Baterai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "baterai.xls";
        $judul = "baterai";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Merk");
	xlsWriteLabel($tablehead, $kolomhead++, "Kapasitas");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");

	foreach ($this->Baterai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Merk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kapasitas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TGL_PERGANTIAN_BATERAI);

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
            'baterai_data' => $this->Baterai_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('baterai/baterai_doc',$data);
    }

}

/* End of file Baterai.php */
/* Location: ./application/controllers/Baterai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-05 17:17:12 */
/* http://harviacode.com */