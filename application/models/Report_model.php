<?php

class Report_model extends CI_Model{
	private $table = 'pengiriman_header';

	function get(){
		$res = $this->db->get($this->table);
		return $res->result();
	}

	// function get_data(){
	// 	return $this->db->query("SELECT *
	// 	from pengiriman_header t1 INNER join port_list t2 
 //        ON t1.portOrigin = t2.port_id")->result();  
	// }

	function get_data(){
		return $this->db->query("SELECT pengiriman_header.*, 
			port_origin.port_name AS port_origin_name, 
			port_destination.port_name AS port_destination_name 
			FROM pengiriman_header
			LEFT JOIN port_list AS port_origin ON port_origin.port_id = pengiriman_header.portOrigin
			LEFT JOIN port_list AS port_destination ON port_destination.port_id = pengiriman_header.portDestination
			")->result();  
	}

}