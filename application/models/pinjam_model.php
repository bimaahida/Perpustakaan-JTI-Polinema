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
			$this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
			$this->db->where('pinjam.status', '1');
			$this->db->order_by("id","desc");
			
			$query = $this->db->get();
			
			return $query->result();
		}
		public function count_pinjam($peminjam){
			$this->db->where('id_user',$peminjam);
			$this->db->where('status','1');
			$query = $this->db->count_all_results('pinjam');
			if($query >= 5){
				return false;
			}else{
				return true;
			}
		}
		public function cek_bukuPinjam($id){
			$this->db->where('id_buku', $id);
			$this->db->where('status','1');	
			$query = $this->db->count_all_results('pinjam');
			if($query >=1){
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

		public function getPinjamByBuku($id)
		{
			$this->db->select('pinjam.id,pinjam.tgl_pinjam,pinjam.tgl_kembali,user.nama,buku.judul');    
			$this->db->from('pinjam');
			$this->db->join('user', 'pinjam.id_user = user.id');
			$this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
			$this->db->where('pinjam.id_buku', $id);
			$this->db->order_by("id","desc");
			
			$query = $this->db->get();
			
			return $query->result();
		}

		public function getPinjamByUser($id)
		{
			$this->db->select('pinjam.id,pinjam.tgl_pinjam,pinjam.tgl_kembali,user.nama,buku.judul');    
			$this->db->from('pinjam');
			$this->db->join('user', 'pinjam.id_user = user.id');
			$this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
			$this->db->where('pinjam.id_user', $id);
			$this->db->order_by("id","desc");
			
			$query = $this->db->get();
			
			return $query->result();
		}
		
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('pinjam');
		}  
}

/* End of file kategori_model.php */
