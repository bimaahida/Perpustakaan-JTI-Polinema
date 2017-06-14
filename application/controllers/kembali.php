<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kembali extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        $this->load->library('acl');
        $data = $this->session->userdata('logged_in');
        $status = $data['status'];

        if (! $this->acl->is_public('kembali'))
        {
            if (! $this->acl->is_allowed('kembali', $status))
            {
                redirect('login/logout','refresh');
            }
        }
        
        $this->load->model('kembali_model');
        
    }

    public function index()
    {
        $data['data'] = $this->kembali_model->getkembali();
        
        $this->load->view('layout/header');
        $this->load->view('layout/menus');
        $this->load->view('kembali/list',$data);
        $this->load->view('layout/footer'); 
    }
    
    public function update($id)
	{
		$this->validation();

		$data['dataPinjam']=$this->kembali_model->getkembaliById($id);
        //var_dump($data['dataPinjam'][0]->tgl_pinjam);
        $tanggal_pinjam = date_create($data['dataPinjam'][0]->tgl_kembali) ;
        $tanggal_sekarang = date("Y-m-d");
        $tanggal_sekarang = date_create($tanggal_sekarang);
        if($tanggal_sekarang > $tanggal_pinjam){
            $selisih =  date_diff($tanggal_sekarang,$tanggal_pinjam);
            $selisih = $selisih->format('%a');
            if( $selisih > 3){
                $selisih = $selisih - 3;
                $denda = 0;
                for($i=0; $i<$selisih;$i++){
                    $denda = $denda + 500;
                }
            }
            $data['denda']=$denda;
        }else{
            $data['denda']=0;
        }
        
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('layout/header');
            $this->load->view('layout/menus');
            $this->load->view('pinjam/edit',$data);
            $this->load->view('layout/footer'); 

		}else{
            $tanggal_sekarang = date("Y-m-d"); 
            $data = array(
                'denda' => $this->input->post('denda'),
                'status' => 0,
                'tgl_dikembalikan' => $tanggal_sekarang
            );
            $this->kembali_model->updateById($id,$data);
            $this->session->set_flashdata('pesan', 'Ubah Data Kategori '.$id. ' Berhasil ');
            redirect('peminjam/');
		}
	}

    public function validation(){
		//load library	
		$this->form_validation->set_rules('pinjam', 'judul', 'trim|required');
        $this->form_validation->set_rules('kemabli', 'pengarang', 'trim|required');
        $this->form_validation->set_rules('judul', 'penerbit', 'trim|required');
        $this->form_validation->set_rules('denda', 'tgl_lahir', 'trim|required');
	}


}

/* End of file Controllername.php */
