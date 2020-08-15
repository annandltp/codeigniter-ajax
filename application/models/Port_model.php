<?php

class Port_model extends CI_Model{
	private $table = 'port_list';
	public $port = ['port_id'=>'','port_country'=>'','port_name'=>''];


	function get(){
		$res = $this->db->get($this->table);
		return $res->result();
	}
	
	function getById($id){
		$port = $this->db->from($this->table)
			->where('port_id',$id)
			->get();

		return current($port->result());
    }  
}