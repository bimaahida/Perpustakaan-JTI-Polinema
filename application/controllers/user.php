<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('user_model');
        
    }

    public function index()
    {
        $data['data'] = $this->user_model->getUser();
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('user/list',$data);
        $this->load->view('layout/footer'); 
    }

    public function create(){
		$this->validation();
		if($this->form_validation->run()==FALSE){
			$this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('user/add');
            $this->load->view('layout/footer'); 
			
		}else{
			$this->config_upload();
			if ( ! $this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					//$this->load->view('tambah_pegawai_view',$error);
			} else {
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'nip' => $this->input->post('nip'),
                    'password' => md5($this->input->post('nip')),
                    'alamat' => $this->input->post('alamat'),
                    'tlp' => $this->input->post('tlp'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'foto' => $this->upload->data('file_name'),
                    'status' => $this->input->post('status')
                );
                $this->user_model->insertuser($data);
                $this->session->set_flashdata('pesan', 'Tambah Data Barang Berhasil  ');
                redirect('user/');
			}
		}		
	}
    public function detail($id){
        $data['user'] = $this->user_model->getUserById($id);
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('user/detail',$data);
        $this->load->view('layout/footer'); 
    }
    public function update($id)
	{
		$this->validation();
		
		$this->load->model('user_model');

		$data['user']=$this->user_model->getUserById($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('user/edit',$data);
            $this->load->view('layout/footer'); 

		}else{
            $this->config_upload();
			if ( ! $this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					//$this->load->view('tambah_pegawai_view',$error);
			} else {
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'nip' => $this->input->post('nip'),
                    'password' => $this->input->post('nip'),
                    'alamat' => $this->input->post('alamat'),
                    'tlp' => $this->input->post('tlp'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'foto' => $this->upload->data('file_name'),
                    'status' => $this->input->post('status')
                );
                $this->user_model->updateById($id,$data);
                $this->session->set_flashdata('pesan', 'Ubah Data Kategori '.$id. ' Berhasil ');
                redirect('user/');
			}
		}
	}

    public function delete($id){
		$this->user_model->delete($id);
		redirect('user/');
	}

    public function validation(){
		//load library	
		$this->form_validation->set_rules('nip', 'Nip / Nis', 'numeric|trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'alpha|trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('tlp', 'telphone', 'numeric|trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
	}
    public function config_upload(){
        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000000000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;

        $this->load->library('upload', $config);
    }


}

/* End of file Controllername.php */
