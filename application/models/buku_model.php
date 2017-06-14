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
			$this->db->select('buku.id,buku.judul,buku.pengarang,buku.tahun_terbit,buku.id_buku,COUNT(buku.judul) as jumlah');    
			$this->db->from('buku');
			$this->db->join('pinjam', 'pinjam.id_buku = buku.id_buku','left');
			$where = "pinjam.id_buku IS NULL or pinjam.status = 0";
			$this->db->where($where);
			$this->db->distinct();
			$this->db->group_by('buku.judul'); 
			$this->db->order_by("buku.id","desc");
			
			$query = $this->db->get();
			
			return $query->result();
		}
		public function getBukuByKategori($kategori){
			$this->db->select('buku.id,buku.judul,buku.pengarang,buku.tahun_terbit,buku.id_buku');    
			$this->db->from('buku');
			$this->db->join('pinjam', 'pinjam.id_buku = buku.id_buku','left');
			$this->db->where('buku.id_kategori',$kategori);
			$this->db->distinct();
			
			$query = $this->db->get();
			
			return $query->result();
		}

		public function getBukuByPenerbit($penerbit){
			$this->db->select('buku.id,buku.judul,buku.pengarang,buku.tahun_terbit,buku.id_buku');    
			$this->db->from('buku');
			$this->db->join('pinjam', 'pinjam.id_buku = buku.id_buku','left');
			$this->db->where('buku.id_penerbit',$penerbit);
			$this->db->distinct();
			
			$query = $this->db->get();
			
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
		public function getBukuByIdDetail($id)
		{
			$this->db->select('buku.foto,buku.id,buku.judul,buku.pengarang,penerbit.nama as penerbit,buku.tahun_terbit,kategori.nama as kategori,buku.id_buku');    
			$this->db->from('buku');
			$this->db->join('kategori', 'kategori.id = buku.id_kategori');
			$this->db->join('penerbit', 'penerbit.id = buku.id_penerbit');
			$this->db->where('buku.id',$id);
			
			$query = $this->db->get();
			
			return $query->result();

		}

		public function updateById($id,$data)
		{
			$this->db->where('id', $id);
			$this->db->update('buku', $data);
		}
		
		public function delete($id){
			$this->db->where('id_buku',$id);
			$this->db->delete('buku');
		}
		public function deleteById($id){
			$this->db->where('id',$id);
			$this->db->delete('buku');
		}

		public function cek_id($id){
			$this->db->select('id_buku');
			$where = "id_buku like '".$id."_'";
			$this->db->where($where);
			$this->db->from('buku');

			$query = $this->db->get();
			
			return $query->result();
		}

}

/* End of file kategori_model.php */
