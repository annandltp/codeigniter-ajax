<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller{
	function __construct() {
		parent::__construct();

		$this->load->model('pengiriman_model');	
    }

    function index(){
		$content['content'] = "pengiriman/form";
		$this->load->view('app_view',$content);
	}
	
	public function getlist(){
		$this->load->model('pengiriman_model');

		$result =[
			"draw"=> $this->input->get('draw'),
			"recordsTotal"=> 1,
			"recordsFiltered"=> 1,
			"data"=> $this->pengiriman_model->get()
		];

		echo json_encode($result);
	}

	public function add(){
		$this->load->library('Auto_number');
		$this->load->model('pengiriman_model');
		$tgl = date('Y-m-d');

		$config['id'] = $this->pengiriman_model->getLastId();
		$config['awalan'] = '';
  		$config['digit'] = 4;
		$this->auto_number->config($config);
		$pengirimanId = $this->auto_number->generate_id();

		//insert data to table header
		$this->pengiriman_model->add_header([
			'pengirimanId'=>$pengirimanId,
			'requestType'=>$this->input->post('request_type'),
			'PortOrigin'=>$this->input->post('port_origin'),
			'PortDestination'=>$this->input->post('port_destination'),
			'shipmenMode'=>$this->input->post('shipmen_mode'),
			'Weight'=>$this->input->post('weight'),
			'Dimension'=>$this->input->post('dimension'),
			'RequestDate'=>$tgl,
			'RequestBy'=>$this->session->userdata('username'),
		]);
		
		//persiapan data ketable detail
		$detail_post = $this->input->post('detail');
		$detail_data = [];
		foreach($detail_post as $key=>$row){
			//$detail_data[$key]['id'] = $key;
			$detail_data[$key]['itemDesc'] = $row['item_desc'];
			$detail_data[$key]['Qty'] = $row['jml'];
			$detail_data[$key]['Satuan'] = $row['satuan'];
			$detail_data[$key]['GoodCategory'] = $row['good_category'];
		}

		//insert data ketable detail
		$this->pengiriman_model->add_detail($detail_data);

		echo json_encode([
			'messages'=>'data berhasil disimpan'
		]);
	}


}