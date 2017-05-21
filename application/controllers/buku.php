<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('buku_model');
        
    }

    public function index()
    {
        $data['data'] = $this->buku_model->getBuku();
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('buku/list',$data);
        $this->load->view('layout/footer'); 
    }

    public function cekDB($judul){
		$hasil = $this->buku_model->cek_buku($judul);
		if($hasil){
			return true;
		}else{
			$this->form_validation->set_message('cekDB','Judul sudah ada');			
			return false;
		}
	}

    public function create(){
		$this->validation();
        $this->form_validation->set_rules('judul', 'judul', 'trim|required|callback_cekDB');

        $this->load->model('kategori_model');
        $this->load->model('penerbit_model');

        $data['dataKategori'] = $this->kategori_model->getKategori();
        $data['dataPenerbit'] = $this->penerbit_model->getPenerbit();

		if($this->form_validation->run()==FALSE){
			$this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('buku/add',$data);
            $this->load->view('layout/footer'); 
			
		}else{
			$this->config_upload();
			if ( ! $this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					//$this->load->view('tambah_pegawai_view',$error);
			} else {
                 $data = array(
                    'judul' => $this->input->post('judul'),
                    'pengarang' => $this->input->post('pengarang'),
                    'id_penerbit' => $this->input->post('penerbit'),
                    'tahun_terbit' => $this->input->post('tahun_terbit'),
                    'id_kategori' => $this->input->post('kategori'),
                    'foto' => $this->upload->data('file_name'),
                    'jumlah' => $this->input->post('jumlah')
                );
                $this->buku_model->insertbuku($data);
                $this->session->set_flashdata('pesan', 'Tambah Data Barang Berhasil  ');
                redirect('buku/');
			}
		}		
	}
    public function detail($id){
        $data['buku'] = $this->buku_model->getBukuById($id);
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('buku/detail',$data);
        $this->load->view('layout/footer'); 
    }
    public function update($id)
	{
		$this->validation();
		
		$this->load->model('buku_model');
        $this->load->model('kategori_model');
        $this->load->model('penerbit_model');

        $data['dataKategori'] = $this->kategori_model->getKategori();
        $data['dataPenerbit'] = $this->penerbit_model->getPenerbit();

		$data['dataBuku']=$this->buku_model->getBukuById($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('buku/edit',$data);
            $this->load->view('layout/footer'); 

		}else{
            $this->config_upload();
			if ( ! $this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					//$this->load->view('tambah_pegawai_view',$error);
			} else {
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'pengarang' => $this->input->post('pengarang'),
                    'id_penerbit' => $this->input->post('penerbit'),
                    'tahun_terbit' => $this->input->post('tahun_terbit'),
                    'id_kategori' => $this->input->post('kategori'),
                    'foto' => $this->upload->data('file_name'),
                    'jumlah' => $this->input->post('jumlah')
                );
                $this->buku_model->updateById($id,$data);
                $this->session->set_flashdata('pesan', 'Ubah Data Kategori '.$id. ' Berhasil ');
                redirect('buku/');
			}
		}
	}

    public function delete($id){
		$this->buku_model->delete($id);
		redirect('buku/');
	}

    public function validation(){
		//load library	
		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'pengarang', 'trim|required');
        $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
        $this->form_validation->set_rules('tahun_terbit', 'tgl_lahir', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'numeric|trim|required');
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
