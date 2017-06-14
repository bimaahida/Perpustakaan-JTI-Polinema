<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

        public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getUser()
		{
			$query = $this->db->get('user');
			return $query->result();
		}

		public function insertuser($data)
		{
			$this->db->insert('user', $data);
		}


		public function getUserById($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('user',1);
			return $query->result();

		}

		public function updateById($id,$data)
		{
			$this->db->where('id', $id);
			$this->db->update('user', $data);
		}
		
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('user');
		}  
		public function login($nip,$password){
			$this->db->where('nip',$nip);
			$this->db->where('password',$password);
			$query = $this->db->get('user',1);
			return $query->result();
		}  

		public function search_name($string){
			$this->db->select('id,nama as label,id as value');
			$this->db->like('nama', $string);
			$query = $this->db->get('user');

			return $query->result();
			
		}

}

/* End of file kategori_model.php */
