<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Katagori_model', 'kategori');
	}

	public function index(){
		$data["kategori"] = $this->kategori->get_all();
		$this->load->view('Kategori/index',$data);

	}


	function add(){
		$data = array(
			'button' => 'Tambah',
			'judul' => 'kategori',
			'idkategori' => set_value('idkategori'),
			'action' => site_url('kategori/addsave'),
			'nama_kategori' => set_value('nama_kategori'),
			'icon' => set_value('icon'),
			'keterangan' => set_value('keterangan'),
			);
		$this->load->view('kategori/form' ,$data);

	}
	
	public function addsave(){
		//$this->_rules();
		//if ($this->form_validation->run() == FALSE) {
		//	$this->add();
		//}else {
			$data = array(
				'idkategori' => $this->input->post('idkategori'),
				'nama_kategori' => $this->input->post('nama_kategori'),
				'icon' => $this->_uploadImage(), 
				'keterangan' => $this->input->post('keterangan')
		);
			//echo()
			//print_r($data);
			$insert = $this->kategori->insert($data);
			redirect(site_url('kategori'));

	}

	 private function _uploadImage(){
	 	$config['upload_path']	= './assets/upload/';
	 	$config['allowed_types'] = 'gif|jpg|png';
	 	$config['overwrite'] =true;
	 	$config['max_size']	= 1824;

	 	$this->load->library('upload', $config);
	 	if ($this->upload->do_upload('icon')) {
	 		return $this->upload->data("file_name");
	 	}
	 	return "icon.png";
	 }

	 public function delete($id){
	 	$this->_deleteImage($id);
	 	$this->kategori->delete($id);
	 	redirect("kategori");

	 }

	 private function _deleteImage($id){
	 	$kategori = $this->kategori->getById($id);
	 	if($kategori->icon != "icon.png"){
	 		$filename = explode(".", $kategori->icon)[0];
	 		return array_map('unlink', glob(FCPATH."assets/upload/$filename.*"));
	 	}
	 }

	 public function update($id)
	 {
	 	$row = $this->kategori->getById($id);
	 	if ($row) {
	 		$data = array(
	 			'button' => 'Ubah',
	 			'action' => site_url('kategori/updatesave'),
	 			'idkategori' => set_value('idkategori', $row->idkategori),
	 			'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
	 			'icon' => set_value('icon',$row->icon),
	 			'keterangan' => set_value('keterangan',$row->keterangan),
	 			);
	 	$this->load->view('kategori/form', $data);
	 	}
	 }

	 public function updatesave()
	 {
	 	$data = array(
				'nama_kategori' => $this->input->post('nama_kategori', TRUE),
				'icon' => $this->_uploadImage(), 
				'keterangan' => $this->input->post('keterangan', TRUE)
		);
		$this->kategori->update($this->input->post('idkategori',TRUE), $data);
		redirect(site_url('kategori/index'));
	 }
}	

 ?>