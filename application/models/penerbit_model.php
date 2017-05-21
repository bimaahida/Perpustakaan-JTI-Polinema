<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penerbit_model extends CI_Model {

        public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getPenerbit()
		{
			$query = $this->db->get('penerbit');
			return $query->result();
		}

		public function insertPenerbit($object)
		{
			$this->db->insert('penerbit', $object);
		}


		public function getPenerbitById($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('penerbit',1);
			return $query->result();

		}

		public function updateById($id,$data)
		{
			$this->db->where('id', $id);
			$this->db->update('penerbit', $data);
		}
		
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('penerbit');
		}    

}

/* End of file penerbit_model.php */
