<?php

class Login_model extends CI_Model{
    private $table = 'user';

    // LOGIN
    function login($username, $password){
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('name', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

    public function cek_auth($filter){
        $res = $this->db->from($this->table)->where($filter)->get();

        if($res->num_rows()>0){
            $data = $res->result();

            $this->session->set_userdata([
                'name'=>$data[0]->username,
                'level'=>$data[0]->level
            ]);

            return true;
        }else
            return false;
    }
}