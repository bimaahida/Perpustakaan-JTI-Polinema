<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('user_model');
        
    }

    public function index()
    {
        $this->load->view('login'); 
    }

    public function login(){
        $this->validation();
        if($this->form_validation->run()==FALSE){
			 $this->load->view('login'); 
		}else{ 
            $nip = $this->input->post('nip');
            $password = $this->input->post('password');
			$user = $this->user_model->login($nip,$password);
            if (!empty($user)){
                if($user[0]->status === '1'){
                    echo "admin";
                }else{
                    echo 'mahasiswa';
                }
                //echo $user[0]->nama;
                //var_dump($user) ;
            }else{
                 $this->load->view('login'); 
            }
		}
       
    }
    public function validation(){
		//load library	
		$this->form_validation->set_rules('nip', 'Nip / Nis', 'numeric|trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
	}

}

/* End of file Controllername.php */
