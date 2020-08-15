<?php

class Pengiriman_model extends CI_Model{
    private $table_header = 'pengiriman_header';
    private $table_detail = 'pengiriman_detail';

    public function add_header($data)
    {
        $this->db->insert($this->table_header,$data);
    }

    public function add_detail($data)
    {
        $this->db->insert_batch($this->table_detail,$data);
    }

    function getLastId(){
        $pengiriman = $this->db->from($this->table_header)
            ->order_by('pengirimanId', 'DESC')
            ->limit(1)
			->get();
        return current($pengiriman->result())->pengirimanId;
    }

    }
?>
