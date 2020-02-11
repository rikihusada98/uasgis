<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Kecamatan_model', 'kecamatan');
	}

	public function index(){
		// $data["lokasi"] = $this->db->query("SELECT a.idkategori, a.nama_kategori, b.* FROM kategori a, lokasi b WHERE a.idkategori = b.idkategori")->result();
		$data["kecamatan"] = $this->kecamatan->get_all();
		$this->load->view('kecamatan/index',$data);

	}
	function add(){
		$data = array(
			'button' => 'Tambah',
			'judul' => 'Kecamatan',
			'action' => site_url('kecamatan/addsave'),
			// 'datakategori' => $this->db->query("SELECT * FROM kategori")->result(),
			'idkecamatan' => set_value('idkecamatan'),
			'Nama_Wilayah' => set_value('Nama_Wilayah'),
			'Wilayah' => set_value('Wilayah'),
			'Data_Wilayah' => set_value('Data_Wilayah'),
			'Keterangan' => set_value('Keterangan'),
			// 'idalbum' => set_value('idalbum'),
			// 'idkategori' => set_value('idkategori'),
			// 'nama_kategori' => set_value('nama_kategori'),
			// 'Keterangan' => set_value('Keterangan'),
			);
		$this->load->view('kecamatan/form' ,$data);

	}
	
	public function addsave(){
		//$this->_rules();
		//if ($this->form_validation->run() == FALSE) {
		//	$this->add();
		//}else {
			$data = array(
				'idkecamatan' => $this->input->post('idkecamatan'),
				'Nama_Wilayah' => $this->input->post('Nama_Wilayah'),
				'Wilayah' => $this->input->post('Wilayah'),
				'Data_Wilayah' => $this->_uploadFile(),
				'Keterangan' => $this->input->post('Keterangan')
		);
			//echo()
			//print_r($data);
			$insert = $this->kecamatan->insert($data);
			redirect(site_url('kecamatan'));

	}

	 private function _uploadFile(){
	 	$config['upload_path']	= './assets/upload/';
	 	$config['allowed_types'] = 'js';
	 	$config['overwrite'] =true;
	 	// $config['max_size']	= 8824;

	 	$this->load->library('upload', $config);
	 	if ($this->upload->do_upload('Data_Wilayah')) {
	 		return $this->upload->data("file_name");
	 	}
	 	return "Data_Wilayah";
	 }

	 public function delete($id){
	 	// $this->_deleteImage($id);
	 	$this->kecamatan->delete($id);
	 	redirect("kecamatan");

	 }

	 private function _deleteFile($id){
	 	$kecamatan = $this->kecamatan->getById($id);
	 	if($kecamatan->file != "js"){
	 		$filename = explode(".", $kecamatan->Data_Wilayah)[0];
	 		return array_map('unlink', glob(FCPATH."assets/upload/$filename.*"));
	 	}
	 }

	 public function update($id)
	 {
	 	$row = $this->kecamatan->getById($id);
	 	if ($row) {
	 		$data = array(
	 			'button' => 'Ubah',
	 			'action' => site_url('kecamatan/updatesave'),
	 			// 'datakategori' => $this->db->query("SELECT * FROM kategori")->result(),
	 			'idkecamatan' => set_value('idkecamatan', $row->idkecamatan),
	 			'Nama_Wilayah' => set_value('Nama_Wilayah', $row->Nama_Wilayah),
	 			// 'Kategori' => set_value('Kategori', $row->Kategori),
				'Wilayah' => set_value('Wilayah', $row->Wilayah),
				'Data_Wilayah' => set_value('Data_Wilayah', $row->Data_Wilayah),
				'Keterangan' => set_value('Keterangan', $row->Keterangan)
	 			);
	 	$this->load->view('kecamatan/form', $data);
	 	}
	 }

	 public function updatesave()
	 {
	 	$data = array(
	 			'Nama_Wilayah' => $this->input->post('Nama_Wilayah', TRUE),
	 			'Wilayah' => $this->input->post('Wilayah', TRUE),
				'Data_Wilayah' => $this->_uploadFile(),
				'Keterangan' => $this->input->post('Keterangan', TRUE)
		);
		$this->kecamatan->update($this->input->post('idkecamatan',TRUE), $data);
		redirect(site_url('kecamatan/index'));
	 }

}
 ?>