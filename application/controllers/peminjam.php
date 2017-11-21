<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peminjam extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        $this->load->library('acl');
        $data = $this->session->userdata('logged_in');
        $status = $data['status'];

        if (! $this->acl->is_public('peminjam'))
        {
            if (! $this->acl->is_allowed('peminjam', $status))
            {
                redirect('login/logout','refresh');
            }
        }
        
        $this->load->model('pinjam_model');
        
    }

    public function index()
    {
        $data['data'] = $this->pinjam_model->getpinjam();
        
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('pinjam/list',$data);
        $this->load->view('layout/footer'); 
    }

    public function cekDB($peminjam){  
		$hasil = $this->pinjam_model->count_pinjam($peminjam);
		if($hasil){
			return true;
		}else{
			$this->form_validation->set_message('cekDB','Peminjaman Melebihi 5 kali');			
			return false;
		}
	}

    public function cekbuku($id){
        $hasil = $this->pinjam_model->cek_bukuPinjam($id);
		if($hasil){
			return true;
		}else{
			$this->form_validation->set_message('cekbuku','Buku Sedang Di Pinjam');			
			return false;
		}
    }

    public function search_peminjam(){
        
        $json = [];
        $input = $_GET['term'];
        $this->load->model('user_model');
        

        if(!empty($input)){
			$json = $this->user_model->search_name($input);
		}
        //var_dump($input);
        echo json_encode($json);
		
    }

    public function search_buku(){
        
        $json = [];
        $input = $_GET['term'];
        $this->load->model('buku_model');
        

        if(!empty($input)){
			$json = $this->buku_model->search_judul($input);
		}
        //var_dump($input);
        echo json_encode($json);
		
    }

    public function create(){
		$this->form_validation->set_rules('pinjam', 'Peminjam', 'trim|required|callback_cekDB');
        $this->form_validation->set_rules('buku', 'Buku', 'trim|required|callback_cekbuku');

		if($this->form_validation->run()==FALSE){
			  $this->load->view('layout/header');
              $this->load->view('layout/menus');
             $this->load->view('pinjam/add');
              $this->load->view('layout/footer'); 	
            //$this->load->view('pinjam/test');
		}else{
            
            $tanggal_sekarang = date("Y/m/d");
            $tambah_tanggal = mktime(0,0,0,date('m')+0,date('d')+14,date('Y')+0);
            $tambah = date('Y-m-d',$tambah_tanggal);

			$data = array(
                'tgl_pinjam' => $tanggal_sekarang,
                'tgl_kembali' => $tambah,
				'id_user' => $this->input->post('pinjam'),
                'id_buku' => $this->input->post('buku'),
				);
			$this->pinjam_model->insertpinjam($data);
			$this->session->set_flashdata('pesan', 'Tambah Data Pinjam Berhasil  ');
			redirect('peminjam/');
		}				
	}
    public function detail($id){
        $data['buku'] = $this->buku_model->getBukuById($id);
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('buku/detail',$data);
        $this->load->view('layout/footer'); 
    }
    function delete($id,$post_id,$ket){
		$this->pinjam_model->delete($id);
		if($ket = 'user'){
            redirect('user/validation_delete/'.$post_id);
        }else{
            redirect('buku/validation_delete/'.$post_id);
        }
        
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


}

/* End of file Controllername.php */
