
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_karyawan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('karyawan/index');
	}

	public function Insert()
	{
		$data = array('nama_karyawan'=>$this->input->post('nama_karyawan'),
					  'telp'=>$this->input->post('telp'));
		//print_r($data);
		$this->session->set_userdata('Simpan_data','Berhasil Disimpan');
		$this->db->Insert('karyawan',$data);
		echo "<meta http-equiv='refresh' conten='0; url=".base_url()."uts_mobile/index.php/C_karyawan/Insert'>"; 
	}

	public function lihat(){
		$data['data']= $this->db->get('karyawan')->result();
		$this->load->view('karyawan/lihat', $data);
	}

	public function edit(){
		$id = $this->uri->segment(3);
		$data ['data'] = $this->db->get_where('karyawan', array('id' => $id))->result();
		$this->load->view('karyawan/edit', $data);
	}

	public function Update(){
		$id = $this->input->post('id');
		$nama_karyawan = $this->input->post('nama_karyawan');
		$telp = $this->input->post('telp');

		//$data = array('Nama Barang'=>$nama_karyawan);
		// nama_karyawan hrs sama dengan nama field yg ada di tabel
		$data=array('nama_karyawan'=>$nama_karyawan,
					'telp'=>$telp);
		//print_r($data);

		$this->db->where('id', $id);
		$this->db->update('karyawan',$data);
		echo "Update data berhasil";
		//echo "<meta http-equiv='refresh' content='0; url=".base_url()."uts_mobile/index.php/C_karyawan/Insert'>";
	}	
	
	public function Hapus(){
		$id = $this->uri->segment(3);
		//echo $id;
		$this->db->where('id',$id) ;
		$this->db->delete('karyawan');
	}
}