<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
		
		$this->load->library('acl');
        $data = $this->session->userdata('logged_in');
        $status = $data['status'];

        if (! $this->acl->is_public('penerbit'))
        {
            if (! $this->acl->is_allowed('penerbit', $status))
            {
                redirect('login/logout','refresh');
            }
        }
        
        $this->load->model('penerbit_model');
        
    }

    public function index()
    {
        $data['data'] = $this->penerbit_model->getpenerbit();
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('penerbit/list',$data);
        $this->load->view('layout/footer'); 
    }

    public function create(){
		$this->validation();
		if($this->form_validation->run()==FALSE){
			$this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('penerbit/add');
            $this->load->view('layout/footer'); 	
		}else{
			$data = array(
				'nama' => $this->input->post('nama'), 
				);
			$this->penerbit_model->insertpenerbit($data);
			$this->session->set_flashdata('pesan', 'Tambah Data penerbit Berhasil  ');
			redirect('penerbit/');
		}		
	}
	
	public function update($id)
	{
		$this->validation();
		$data['data']=$this->penerbit_model->getpenerbitById($id);
		if($this->form_validation->run()==FALSE){
			$this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('penerbit/edit',$data);
            $this->load->view('layout/footer'); 
		}else{
			$data = array(
				'nama' => $this->input->post('nama'), 
				);
			$this->penerbit_model->updateById($id,$data);
			$this->session->set_flashdata('pesan', 'Ubah Data penerbit '.$id. ' Berhasil ');
			redirect('penerbit/');
		}
	}
    function delete($id){
		$this->penerbit_model->delete($id);
		redirect('penerbit/');
	}
	
	public function validation_delete($id){
        $this->load->model('buku_model');
        $data['data'] =  $this->buku_model->getBukuByPenerbit($id);
        if(count($data['data']) >0){
            $this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('buku/list',$data);
            $this->load->view('layout/footer'); 
        }else{
            $this->delete($id);
        }
	}

    public function validation(){
		//load library	
		$this->form_validation->set_rules('nama', 'Nama', 'alpha_numeric_spaces|trim|required');

    }
}

/* End of file Controllername.php */
