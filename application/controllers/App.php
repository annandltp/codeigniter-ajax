<?php defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller{
	
	function index(){
		//var_dump($this->session->userdata());

		$this->load->view('app_view');
	}
	

}