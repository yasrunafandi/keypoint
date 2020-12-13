<?php
class M_login extends CI_Model{
    
    function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }
   // function auth_level($username,$password){
   // $query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
   // return $query;
   // }
}

?>