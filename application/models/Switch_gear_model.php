<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Switch_gear_model extends CI_Model
{

    public $table = 'switch_gear';
    public $id = 'Id_Status_Switch_Gear';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('Id_Status_Switch_Gear', $q);
	$this->db->or_like('Status_Switch_Gear', $q);
	$this->db->or_like('Penyulang1', $q);
	$this->db->or_like('Penyulang2', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('Id_Status_Switch_Gear', $q);
	$this->db->or_like('Status_Switch_Gear', $q);
	$this->db->or_like('Penyulang1', $q);
	$this->db->or_like('Penyulang2', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Switch_gear_model.php */
/* Location: ./application/models/Switch_gear_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-07-18 18:55:21 */
/* http://harviacode.com */