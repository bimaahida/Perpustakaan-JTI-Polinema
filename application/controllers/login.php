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
            $user = $this->session->get_userdata('logged_in');
            //var_dump($user);  
            
            redirect('buku','refresh');
            
		}
       
    }
    public function cekDB($password){
        $nip = $this->input->post('nip');
        $user = $this->user_model->login($nip,md5($password));
        if (!empty($user)){
            $sess_array=array(
                'id'=>$user[0]->id,
                'nip'=>$user[0]->nip,
                'status'=>$user[0]->status,
                'nama'=>$user[0]->nama,
                'foto'=>$user[0]->foto
            );
            $this->session->set_userdata('logged_in',$sess_array);
            return true;
            //echo $user[0]->nama;
            //var_dump($user) ;
        }else{
                $this->form_validation->set_message('cekDB','Login Gagal Username Dan Password tidak Valid');
                return false;
        }
    }
    public function validation(){
		//load library	
		$this->form_validation->set_rules('nip', 'Nip / Nis', 'numeric|trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDB');
	}

    public function logout(){
        $this->session->unset_userdata('logged_in');
        
        redirect('login','refresh');
        
    }

}

/* End of file Controllername.php */
