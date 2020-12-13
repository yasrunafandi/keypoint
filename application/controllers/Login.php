<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('M_login');
    }
public function index(){
    $this->load->view('login');
}
function aksi_login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
        'username' => $username,
        'password' => md5($password)
    );
    $cek = $this->M_login->cek_login("user",$where);
    if ($cek->num_rows() > 0){
        // $r = $cek->result()[0];
        // print_r($r->level);

        if($cek->result()[0]->level == 'staf') {
            $this->session->set_userdata($where);
            redirect(base_url("home"));

        } elseif($cek->result()[0]->level == 'manager'){
            $this->session->set_userdata($where);
            redirect(base_url("manager"));
        }

        // $data_session = array(
        //     'nama' => $username,
        //     'status' => "login"
        // );
        // $this->session->set_user_data($data_session);
      
          
    }else{
        echo"Username dan password salah !";
    }

}

// function auth(){
//     $username = $this->input->post('username');
//     $password = $this->input->post('password');
//     $where = array(
//         'username' => $username,
//         'password' => md5($password)
//     );
//     $cek = $this->M_login->auth_level("user",$where)->num_rows();
//     if($cek->num_rows() > 0){
//         $data=$cek->row_array();
//         if($data['level'=='staf']){
//             redirect(base_url("home"));
//         }
//         else if($data['level'=='manager']){
//             redirect(base_url("manager"));
//         }
          
//     }else{
//         echo"Username dan password salah !";
//     }
// }




   function logout(){
       $this->session->sess_destroy();
       redirect(base_url('login'));
   }

}

