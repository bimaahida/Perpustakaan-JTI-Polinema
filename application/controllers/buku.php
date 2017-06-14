<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('acl');
        $this->load->model('buku_model');
    }

    public function index()
    {
        $this->cek_status('buku/index');

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
        $this->cek_status('buku/create');

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
                $jumlah = $this->input->post('jumlah');
                
                $kode = $this->buku_model->cek_id($this->input->post('kode'));
                $id_buku_terahir = 0;
                foreach($kode as $key){
                    $id_buku_terahir++;
                }
                echo $id_buku_terahir;

                if($id_buku_terahir > 0){
                    $id_buku_terahir;
                    $jumlah = $jumlah + $id_buku_terahir;
                }else{
                    $id_buku_terahir = 0;
                }

                for($i = $id_buku_terahir;$i<$jumlah;$i++){
                   $data = array(
                        'judul' => $this->input->post('judul'),
                        'pengarang' => $this->input->post('pengarang'),
                        'id_penerbit' => $this->input->post('penerbit'),
                        'tahun_terbit' => $this->input->post('tahun_terbit'),
                        'id_kategori' => $this->input->post('kategori'),
                        'foto' => $this->upload->data('file_name'),
                        'id_buku' => $this->input->post('kode').$i
                    );
                    $this->buku_model->insertbuku($data);     
                }
                $this->session->set_flashdata('pesan', 'Tambah Data Barang Berhasil  ');
                redirect('buku/');
			}
		}		
	}
    public function detail($id){

        $this->cek_status('buku/detail');
        
        $data['buku'] = $this->buku_model->getBukuByIdDetail($id);
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('buku/detail',$data);
        $this->load->view('layout/footer'); 
    }
    public function update($id){
        $this->cek_status('buku/update');

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
        $this->cek_status('buku/delete');

		$this->buku_model->delete($id);
		redirect('buku/');
	}
    public function delete_validasi($id,$id_kategori,$ket){
        $this->cek_status('buku/delete_validasi');

		$this->buku_model->deleteById($id);
        if($ket=='kat'){
            redirect('kategori/validation_delete/'.$id_kategori.'/'.$ket);
        }else if($ket=='pen'){
            redirect('penerbit/validation_delete/'.$id_kategori.'/'.$ket);
        }
	}

    public function validation_delete($id){
        $this->cek_status('buku/validation_delete');

        $this->load->model('pinjam_model');
        $data['data'] =  $this->pinjam_model->getPinjamByBuku($id);
        if(count($data['data']) >0){
            $this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('pinjam/list',$data);
            $this->load->view('layout/footer'); 
        }else{
            $this->delete($id);
        }
    }

    public function validation(){
		//load library	
		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'pengarang', 'trim|required');
        $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
        $this->form_validation->set_rules('tahun_terbit', 'tgl_lahir', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Tanggal Lahir', 'trim|required');
	}

    public function config_upload(){
        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000000000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;

        $this->load->library('upload', $config);
    }

    public function cek_status($path){
        $data = $this->session->userdata('logged_in');
        $status = $data['status'];

        if (! $this->acl->is_public($path))
        {
            if (! $this->acl->is_allowed($path, $status))
            {
                redirect('login/logout','refresh');
            }
        }
    }
    public function cek_id($id){
        $data = $this->buku_model->cek_id($id);
        $i = 0;
        foreach($data as $key){
            $i++;
        }
        echo $i;
    }

    


}

/* End of file Controllername.php */
