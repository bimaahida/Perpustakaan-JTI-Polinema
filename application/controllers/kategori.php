<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->library('acl');
        $data = $this->session->userdata('logged_in');
        $status = $data['status'];

        if (! $this->acl->is_public('kategori'))
        {
            if (! $this->acl->is_allowed('kategori', $status))
            {
                redirect('login/logout','refresh');
            }
        }

        $this->load->model('kategori_model');

        
    }

    public function index()
    {
        $data['data'] = $this->kategori_model->getKategori();
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('kategori/list',$data);
        $this->load->view('layout/footer'); 
    }
	
	public function cekDB($nama){
		$hasil = $this->kategori_model->cek_kategori($nama);
		if($hasil){
			return true;
		}else{
			$this->form_validation->set_message('cekDB','Nama kateogir sudah ada');			
			return false;
		} 
	}

    public function create(){
		$this->form_validation->set_rules('nama', 'Nama', 'alpha_numeric_spaces|trim|required|callback_cekDB');
		if($this->form_validation->run()==FALSE){
			$this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('kategori/add');
            $this->load->view('layout/footer'); 	
		}else{
			$data = array(
				'nama' => $this->input->post('nama')
				);
			$this->kategori_model->insertkategori($data);
			$this->session->set_flashdata('pesan', 'Tambah Data Kategori Berhasil  ');
			redirect('kategori/');
		}		
	}
	
	public function update($id)
	{
		$this->validation();
		$data['data']=$this->kategori_model->getKategoriById($id);
		if($this->form_validation->run()==FALSE){
			$this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('kategori/edit',$data);
            $this->load->view('layout/footer'); 
		}else{
			$data = array(
				'nama' => $this->input->post('nama')
				);
			$this->kategori_model->updateById($id,$data);
			$this->session->set_flashdata('pesan', 'Ubah Data Kategori '.$id. ' Berhasil ');
			redirect('kategori/');
		}
	}
    function delete($id){
		$this->kategori_model->delete($id);
		redirect('kategori/');
	}

	public function validation_delete($id){
        $this->load->model('buku_model');
        $data['data'] =  $this->buku_model->getBukuByKategori($id);
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
