
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_customer extends CI_Controller {

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
		$this->load->view('customer/index');
	}

	//Proses CRUD

	public function Insert() //Create
	{
		$data = array('nama_lengkap'=>$this->input->post('nama_lengkap'),
					  'telp'=>$this->input->post('telp'),
					  'alamat'=>$this->input->post('alamat'));
		//print_r($data);
		$this->session->set_userdata('Simpan_data','Berhasil Disimpan');
		$this->db->Insert('customer',$data);
		echo "<meta http-equiv='refresh' conten='0; url=".base_url()."uts_mobile/index.php/C_customer/Insert'>"; 
	}

	public function lihat(){ //Read
		$data['data']= $this->db->get('customer')->result();
		$this->load->view('customer/lihat', $data);
	}

	public function edit(){
		$id = $this->uri->segment(3);
		$data ['data'] = $this->db->get_where('customer', array('id' => $id))->result();
		$this->load->view('customer/edit', $data);
	}

	public function Update(){ //Update
		$id = $this->input->post('id');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');

		//$data = array('Nama Barang'=>$nama_lengkap);
		// nama_lengkap hrs sama dengan nama field yg ada di tabel
		$data=array('nama_lengkap'=>$nama_lengkap,
					'telp'=>$telp,
					'alamat'=>$alamat);
		//print_r($data);

		$this->db->where('id', $id);
		$this->db->update('customer',$data);
		echo "Update data berhasil";
		//echo "<meta http-equiv='refresh' content='0; url=".base_url()."uts_mobile/index.php/C_customer/Insert'>";
	}	
	
	public function Hapus(){ //Delete
		$id = $this->uri->segment(3);
		//echo $id;
		$this->db->where('id',$id) ;
		$this->db->delete('customer');
	}		

}