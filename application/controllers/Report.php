<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{
	
	function __construct() {
		parent::__construct();

		$this->load->model('Report_model');	
    }

	function index(){
		
		$id = $this->input->get('id');
		if($id !=''){
			$content['data']	= $this->Report_model->getById($id);
		}else
			$content['data']	= $this->Report_model->get_data();

		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
			&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

			echo json_encode($content);
		}else{
			$content['content'] = "report_view";
			$this->load->view('app_view',$content);
		}

		
    }
	

}