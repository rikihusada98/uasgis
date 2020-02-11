<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Lokasi_model', 'lokasi');
	}

	public function index(){
		$data["lokasi"] = $this->db->query("SELECT a.idkategori, a.nama_kategori, b.* FROM kategori a, lokasi b WHERE a.idkategori = b.idkategori")->result();
		$this->load->view('Lokasi/index',$data);

	}
	function add(){
		$data = array(
			'button' => 'Tambah',
			'judul' => 'Lokasi',
			'action' => site_url('lokasi/addsave'),
			'datakategori' => $this->db->query("SELECT * FROM kategori")->result(),
			'idlokasi' => set_value('idlokasi'),
			'Nama_Lokasi' => set_value('Nama_Lokasi'),
			'Kategori' => set_value('Kategori'),
			'Latitude' => set_value('Latitude'),
			'Logitude' => set_value('Logitude'),
			'idalbum' => set_value('idalbum'),
			'idkategori' => set_value('idkategori'),
			'nama_kategori' => set_value('nama_kategori'),
			'Keterangan' => set_value('Keterangan'),
			);
		$this->load->view('lokasi/form' ,$data);

	}
	
	public function addsave(){
		//$this->_rules();
		//if ($this->form_validation->run() == FALSE) {
		//	$this->add();
		//}else {
			$data = array(
				'idlokasi' => $this->input->post('idlokasi'),
				'Nama_Lokasi' => $this->input->post('Nama_Lokasi'),
				'idkategori' => $this->input->post('idkategori'),
				'Latitude' => $this->input->post('Latitude'),
				'Logitude' => $this->input->post('Logitude'),
				'idkategori' => $this->input->post('idkategori'),
				'Keterangan' => $this->input->post('Keterangan')
		);
			//echo()
			//print_r($data);
			$insert = $this->lokasi->insert($data);
			redirect(site_url('lokasi'));

	}

	 // private function _uploadImage(){
	 // 	$config['upload_path']	= './assets/upload/';
	 // 	$config['allowed_types'] = 'gif|jpg|png';
	 // 	$config['overwrite'] =true;
	 // 	$config['max_size']	= 1824;

	 // 	$this->load->library('upload', $config);
	 // 	if ($this->upload->do_upload('icon')) {
	 // 		return $this->upload->data("file_name");
	 // 	}
	 // 	return "icon.png";
	 // }

	 public function delete($id){
	 	// $this->_deleteImage($id);
	 	$this->lokasi->delete($id);
	 	redirect("lokasi");

	 }

	 // private function _deleteImage($id){
	 // 	$kategori = $this->kategori->getById($id);
	 // 	if($kategori->icon != "icon.png"){
	 // 		$filename = explode(".", $kategori->icon)[0];
	 // 		return array_map('unlink', glob(FCPATH."assets/upload/$filename.*"));
	 // 	}
	 // }

	 public function update($id)
	 {
	 	$row = $this->lokasi->getById($id);
	 	if ($row) {
	 		$data = array(
	 			'button' => 'Ubah',
	 			'action' => site_url('lokasi/updatesave'),
	 			'datakategori' => $this->db->query("SELECT * FROM kategori")->result(),
	 			'idlokasi' => set_value('idlokasi', $row->idlokasi),
	 			'Nama_Lokasi' => set_value('Nama_Lokasi', $row->Nama_Lokasi),
	 			// 'Kategori' => set_value('Kategori', $row->Kategori),
				'Latitude' => set_value('Latitude', $row->Latitude),
				'Logitude' => set_value('Logitude', $row->Logitude),
				'idkategori' => set_value('idkategori', $row->idkategori),
				'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
				'Keterangan' => set_value('Keterangan', $row->Keterangan)
	 			);
	 	$this->load->view('lokasi/form', $data);
	 	}
	 }

	 public function updatesave()
	 {
	 	$data = array(
	 			'Nama_Lokasi' => $this->input->post('Nama_Lokasi', TRUE),
	 			'idkategori' => $this->input->post('idkategori', TRUE),
				'Latitude' => $this->input->post('Latitude', TRUE),
				'Logitude' => $this->input->post('Logitude', TRUE),
				'idkategori' => $this->input->post('idkategori', TRUE),
				'Keterangan' => $this->input->post('Keterangan', TRUE)
		);
		$this->lokasi->update($this->input->post('idlokasi',TRUE), $data);
		redirect(site_url('lokasi/index'));
	 }
}
 ?>