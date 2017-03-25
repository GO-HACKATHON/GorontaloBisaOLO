<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Model extends CI_Model {

    private $table;
    private $pk;

    public function __construct() {
        parent::__construct();
    }

    public function set_table($table = '', $pk = '') {
        $this->table = $table;
        $this->pk = $pk;
        return $this;
    }

    public function get_all($order = NULL) {
        if ($order === NULL){
            $this->db->order_by($this->pk . ' desc');
            return $this->_get()->result();
        }else{
            $this->db->order_by($this->pk . ' '.$order);
            return $this->_get()->result();
        }
    }

    public function get_array() {
        return $this->_get()->result_array();
    }

    public function get($id = '0') {
        $this->db->where($this->pk, $id);
        return $this->_get()->row();
    }

    public function get_last_id() {
        $this->db->limit('1');
        $this->db->order_by($this->pk . ' desc');
        return $this->_get()->row();
    }

    // public function get_last() {
    //     $this->db->limit('1');
    //     $this->db->order_by($this->pk . ' desc');
    //     return $this->_get()->result();
    // }
    
    public function get_by($param) {
        if (is_array($param)) {
            $this->db->where($param);
            return $this->_get()->row();
        }
        return FALSE;
    }

    public function get_many_by($param,$order = NULL) {
        if (is_array($param)) {
            $this->db->where($param);
            return $this->get_all($order);
        }
        return FALSE;
    }

    public function insert($data = array()) {
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
        }
        return false;
    }

    public function delete($id = 0) {
        if ($this->db->delete($this->table, array($this->pk => $id))) {
            return true;
        }
        return false;
    }
    public function delete_by($where = array()) {
        if ($this->db->delete($this->table, $where)) {
            return true;
        }
        return false;
    }

    public function update($id = 0, $data = array()) {
        $this->db->where(array($this->pk => $id));
        if ($this->db->update($this->table, $data)) {
            return true;
        }
        return false;
    }

    public function update_by($where = array(), $data = array()) {
        $this->db->where($where);
        if ($this->db->update($this->table, $data)) {
            return true;
        }
        return false;
    }

    protected function _get() {
        return $this->db->get($this->table);
    }

}

?>