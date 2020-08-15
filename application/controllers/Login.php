<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Login_model');
    }
    function index(){
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('login',$data);
    }
    function cek_login() {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query the database
        $result = $this->Login_model->login($username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'ID' => $row->userid,
                    'username' => $row->name,
                    'PASS'=>$row->password,
                    'LEVEL' => $row->level,
                    
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);
                redirect('App');
            }
            return TRUE;
        } else {
            //if form validate false
            redirect('login/gagal_login','refresh');
            return FALSE;
        }
    }
    function gagal_login(){
        $url = base_url('login');
        echo $this->session->set_flashdata('msg','Username Atau Password Salah');
        redirect($url);
    }
    function logout() {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('NAME');
        $this->session->unset_userdata('USER');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('LEVEL');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('login');
    }
}