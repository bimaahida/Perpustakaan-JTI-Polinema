<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kembali_model extends CI_Model {

        public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getkembali()
		{
			$this->db->select('pinjam.id,pinjam.tgl_pinjam,pinjam.tgl_kembali,user.nama,buku.judul,pinjam.denda,pinjam.tgl_dikembalikan');    
			$this->db->from('pinjam');
			$this->db->join('user', 'pinjam.id_user = user.id');
			$this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
			$this->db->where('pinjam.status', '0');
			$this->db->order_by("id","desc");
			
			$query = $this->db->get();
			
			return $query->result();
		}
		public function getkembaliById($id)
		{
			$this->db->select('pinjam.id,pinjam.tgl_pinjam,pinjam.tgl_kembali,user.nama,buku.judul,pinjam.denda');    
			$this->db->from('pinjam');
			$this->db->join('user', 'pinjam.id_user = user.id');
			$this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
			$this->db->where('pinjam.id', $id);
			$this->db->order_by("id","desc");
			
			$query = $this->db->get();
			
			return $query->result();

		}
		public function updateById($id,$data)
		{
			$this->db->where('id', $id);
			$this->db->update('pinjam', $data);
		}
}

/* End of file kategori_model.php */
