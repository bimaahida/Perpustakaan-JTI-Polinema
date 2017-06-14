<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model {

        public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getKategori()
		{
			$query = $this->db->get('kategori');
			return $query->result();
		}

		public function cek_kategori($nama){
			$this->db->where('nama', $nama);	
			$query = $this->db->get('kategori');
			if($query->num_rows() >=1){
				return false;
			}else{
				return true;
			}
		}

		public function insertKategori($object)
		{
			$this->db->insert('kategori', $object);
		}


		public function getKategoriById($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('kategori',1);
			return $query->result();

		}

		public function updateById($id,$data)
		{
			$this->db->where('id', $id);
			$this->db->update('kategori', $data);
		}
		
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('kategori');
		} 
}

/* End of file kategori_model.php */
