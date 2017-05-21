<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pinjam_model extends CI_Model {

        public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getpinjam()
		{
			$this->db->select('pinjam.id,pinjam.tgl_pinjam,pinjam.tgl_kembali,user.nama,buku.judul');    
			$this->db->from('pinjam');
			$this->db->join('user', 'pinjam.id_user = user.id');
			$this->db->join('buku', 'pinjam.id_buku = buku.id');
			$this->db->where('pinjam.status', '1');
			
			$query = $this->db->get();
			
			return $query->result();
		}
		public function count_pinjam($id_peminjam){
			$this->db->where('id_user', $id_peminjam);
			$this->db->where('status', '1');
			$this->db->from('pinjam');
			if($this->db->count_all_results() >= 5){
				return false;
			}else{
				return true;
			}
		} 

		public function insertpinjam($data)
		{
			$this->db->insert('pinjam', $data);
		}


		public function getpinjamById($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('pinjam',1);
			return $query->result();

		}

		public function updateById($id,$data)
		{
			$this->db->where('id', $id);
			$this->db->update('pinjam', $data);
		}
		
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('pinjam');
		}  
}

/* End of file kategori_model.php */
