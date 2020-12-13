<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null && $this->session->userdata('password') == null) {
			redirect('login'); }
        $this->load->model('Lokasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'lokasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'lokasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'lokasi/index.html';
            $config['first_url'] = base_url() . 'lokasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Lokasi_model->total_rows($q);
        $lokasi = $this->Lokasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'lokasi_data' => $lokasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('lokasi/lokasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Lokasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Id_Lokasi' => $row->Id_Lokasi,
		'Area' => $row->Area,
		'Rayon' => $row->Rayon,
		'Gardu_Induk' => $row->Gardu_Induk,
	    );
            $this->load->view('lokasi/lokasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lokasi/create_action'),
	    'Id_Lokasi' => set_value('Id_Lokasi'),
	    'Area' => set_value('Area'),
	    'Rayon' => set_value('Rayon'),
	    'Gardu_Induk' => set_value('Gardu_Induk'),
	);
        $this->load->view('lokasi/lokasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Area' => $this->input->post('Area',TRUE),
		'Rayon' => $this->input->post('Rayon',TRUE),
		'Gardu_Induk' => $this->input->post('Gardu_Induk',TRUE),
	    );

            $this->Lokasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('lokasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Lokasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lokasi/update_action'),
		'Id_Lokasi' => set_value('Id_Lokasi', $row->Id_Lokasi),
		'Area' => set_value('Area', $row->Area),
		'Rayon' => set_value('Rayon', $row->Rayon),
		'Gardu_Induk' => set_value('Gardu_Induk', $row->Gardu_Induk),
	    );
            $this->load->view('lokasi/lokasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Id_Lokasi', TRUE));
        } else {
            $data = array(
		'Area' => $this->input->post('Area',TRUE),
		'Rayon' => $this->input->post('Rayon',TRUE),
		'Gardu_Induk' => $this->input->post('Gardu_Induk',TRUE),
	    );

            $this->Lokasi_model->update($this->input->post('Id_Lokasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lokasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lokasi_model->get_by_id($id);

        if ($row) {
            $this->Lokasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lokasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lokasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Area', 'area', 'trim|required');
	$this->form_validation->set_rules('Rayon', 'rayon', 'trim|required');
	$this->form_validation->set_rules('Gardu_Induk', 'gardu induk', 'trim|required');

	$this->form_validation->set_rules('Id_Lokasi', 'Id_Lokasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "lokasi.xls";
        $judul = "lokasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Gardu Induk");

	foreach ($this->Lokasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Area);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Rayon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Gardu_Induk);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=lokasi.doc");

        $data = array(
            'lokasi_data' => $this->Lokasi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('lokasi/lokasi_doc',$data);
    }

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/Lokasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-18 18:55:21 */
/* http://harviacode.com */