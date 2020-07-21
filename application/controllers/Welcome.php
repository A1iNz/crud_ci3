<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['hasil'] = $this->model_uks->getUser('tb_siswa');
		$this->load->view('welcome_message', $data);
	}
	
	public function form_input(){
		$this->load->view('form_input');
	}
	public function insert(){
		$tanggal = $_POST['tgl'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kls'];
		$tb = $_POST['tb'];
		$bb = $_POST['bb'];
		$ket = $_POST['ket'];
		$data = array('nama' => $nama, 'kls' => $kelas, 'tgl' => $tanggal, 'tb' => $tb, 'bb' => $bb,'ket' => $ket);
		$tambah = $this->model_uks->tambahData('tb_siswa', $data);
		if($tambah > 0){
			redirect('welcome/index');
		}else{
			echo('Gagal Tersimpan');
		}
	}

	public function form_edit($id){
		$this->data['dataEdit'] = $this->model_uks->dataEdit('tb_siswa', $id);
		$this->load->view('form_edit', $this->data);
	}

	public function delete($id){
		$hapus = $this->model_uks->hapusData('tb_siswa',$id);
		if($hapus > 0){
			redirect('welcome/index');
		}else{
			echo "Gagal disimpan";
		}
	}

	public function update($id){
		$tanggal = $_POST['tgl'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kls'];
		$tb = $_POST['tb'];
		$bb = $_POST['bb'];
		$ket = $_POST['ket'];
		$data = array('nama' => $nama, 'kls' => $kelas, 'tgl' => $tanggal, 'tb' => $tb, 'bb' => $bb,'ket' => $ket);
		$edit = $this->model_uks->editData('tb_siswa', $data, $id);
		if($edit > 0){
			redirect('welcome/index');
		}else{
			echo('Gagal Tersimpan');
		}
	}
}
