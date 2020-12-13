<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maps extends CI_Controller
{
public function index(){
    $this->load->view('pemeliharaan/pemeliharaan_maps');
}
   

}
