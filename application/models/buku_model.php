<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku_model extends CI_Model {

        public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getBuku()
		{
			$query = $this->db->get('buku');
			return $query->result();
		}

		public function cek_buku($judul){
			$this->db->where('judul', $judul);	
			$query = $this->db->get('buku');
			if($query->num_rows() >=1){
				return false;
			}else{
				return true;
			}
		}

		public function insertBuku($data)
		{
			$this->db->insert('buku', $data);
		}


		public function getBukuById($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('buku',1);
			return $query->result();

		}

		public function updateById($id,$data)
		{
			$this->db->where('id', $id);
			$this->db->update('buku', $data);
		}
		
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('buku');
		}

}

/* End of file kategori_model.php */
