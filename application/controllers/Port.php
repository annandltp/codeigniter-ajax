<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Port extends CI_Controller{
	function __construct() {
		parent::__construct();

		$this->load->model('Port_model');	
    }

    function index(){
		$id = $this->input->get('id');
		if($id !=''){
			$content['data']	= $this->Port_model->getById($id);
		}else
			$content['data']	= $this->Port_model->get();

		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
			&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

			echo json_encode($content);
		}else{
			$this->load->view('app_view',$content);
		}	
    }

    
}