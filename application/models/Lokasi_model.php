<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model{

	public $tabel = 'lokasi';
	public $id = 'idlokasi';
	public $order = 'ASC';
	

	function get_all(){
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->tabel)->result();
	}
		//tambah data
	function insert($data){
		$this->db->insert($this->tabel, $data);
	}

		//update date
	function update($id, $data){

		$this->db->where($this->id, $id);
		$this->db->update($this->tabel, $data);
	}

	// 	//hapus data
	function delete($id){

		$this->db->where($this->id, $id);
		$this->db->delete($this->tabel);
	}

	public function getById($id){
		// return $this->db->get_where($this->tabel, ["idlokasi" => $id])
		// ->row();

		$query = $this->db->query("SELECT a.idkategori, a.nama_kategori, b.* FROM kategori a, lokasi b WHERE a.idkategori = b.idkategori AND b.idlokasi = $id")->row();
		return $query;
	}
}
 ?>