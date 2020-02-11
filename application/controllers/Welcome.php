<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// peta titik kordinat
	public function index()
	// {
	// 	$data['map'] = $this->db->query('SELECT a.*, b.idkategori, b.nama_kategori, b.icon FROM lokasi a, kategori b where a.idkategori= b.idkategori')->result();
	// 	$this->load->view('welcome_message',$data);
	// }
 	{
		$data['map'] = $this->db->query('SELECT a.*, b.idkategori, b.nama_kategori, b.icon FROM lokasi a, kategori b where a.idkategori= b.idkategori')->result();
		$this->load->view('welcome_message',$data);
	}
}
