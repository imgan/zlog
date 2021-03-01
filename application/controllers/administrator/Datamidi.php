<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamidi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_datamidi');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mymediakoneksi = $this->model_datamidi->viewOrdering('media_koneksi', 'id', 'desc')->result_array();
			$myjenisperangkat = $this->model_datamidi->viewOrdering('jenis_perangkat', 'id', 'desc')->result_array();
			$mymerekperangkat = $this->model_datamidi->viewOrdering('merek_perangkat', 'id', 'desc')->result_array();
			$myvendor = $this->model_datamidi->viewOrdering('vendor_detail', 'id', 'desc')->result_array();
			$myinet = $this->model_datamidi->viewOrdering('inet', 'id', 'desc')->result_array();

			$data = array(
				'page_content'      => '../pageadmin/datamidi/view',
				'ribbon'            => '<li class="active">Daftar Data Midi</li>',
				'page_name'         => 'Daftar Data Midi',
				'mymediakoneksi'	=> $mymediakoneksi,
				'myjenisperangkat'	=> $myjenisperangkat,
				'mymerekperangkat'	=> $mymerekperangkat,
				'myvendor'	=> $myvendor,
				'myinet'	=> $myinet
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_datamidi->viewOrderingCustom('datamidi', 'id', 'desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data_id = array(
				'id'  => $this->input->post('e_id')
			);
			$data = array(
				'nama'  => $this->input->post('e_nama'),
				'keterangan'  => $this->input->post('e_keterangan'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('name'),
			);
			$action = $this->model_datamidi->update($data_id, $data, 'datamidi');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_datamidi->viewWhere('datamidi', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function delete()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$action = $this->model_datamidi->delete($data_id, 'datamidi');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$config['upload_path'] = './assets/datamidi';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif|pdf';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("dokumen");
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$data = array(
					'kode'  => $this->input->post('kode'),
					'nama'  => $this->input->post('nama'),
					'alamat'  => $this->input->post('alamat'),
					'titik_kordinat'  => $this->input->post('titik_kordinat'),
					'telp_toko'  => $this->input->post('telp_toko'),
					'pejabat_toko'  => $this->input->post('nama_pejabat_toko'),
					'telp_pejabat_toko'  => $this->input->post('telp_pejabat'),
					'nama_it_cabang'  => $this->input->post('nama_it_cabang'),
					'telp_it_cabang'  => $this->input->post('telp_it_cabang'),
					'tgl_aktivasi'  => $this->input->post('tgl_aktivasi'),
					'pic_aktivasi'  => $this->input->post('pic_aktivasi'),
					'media_koneksi'  => $this->input->post('media_koneksi'),
					'jenis_perangkat'  => $this->input->post('jenis_perangkat'),
					'type_perangkat'  => $this->input->post('type_perangkat'),
					'merek_perangkat'  => $this->input->post('merek_perangkat'),
					'mac_address'  => $this->input->post('macaddress'),
					'serial_number'  => $this->input->post('serial_number'),
					'nomor_1'  => $this->input->post('nomor_1'),
					'nomor_2'  => $this->input->post('nomor_2'),
					'imei1'  => $this->input->post('imei_1'),
					'dokumen'	=> $file_name,
					'imei2'  => $this->input->post('imei_2'),
					'inet'  => $this->input->post('nomor_inet'),
					'vendor'  => $this->input->post('vendor'),
					'kapasitas'  => $this->input->post('kapasitas'),
					'status'  => $this->input->post('status'),
					'dokumen'  => $this->input->post('dokumen'),
					'keterangan'  => $this->input->post('keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			} else {
				$data = array(
					'kode'  => $this->input->post('kode'),
					'nama'  => $this->input->post('nama'),
					'alamat'  => $this->input->post('alamat'),
					'titik_kordinat'  => $this->input->post('titik_kordinat'),
					'telp_toko'  => $this->input->post('telp_toko'),
					'pejabat_toko'  => $this->input->post('nama_pejabat_toko'),
					'telp_pejabat_toko'  => $this->input->post('telp_pejabat'),
					'nama_it_cabang'  => $this->input->post('nama_it_cabang'),
					'telp_it_cabang'  => $this->input->post('telp_it_cabang'),
					'pic_aktivasi'  => $this->input->post('pic_aktivasi'),
					'tgl_aktivasi'  => $this->input->post('tgl_aktivasi'),
					'media_koneksi'  => $this->input->post('media_koneksi'),
					'jenis_perangkat'  => $this->input->post('jenis_perangkat'),
					'type_perangkat'  => $this->input->post('type_perangkat'),
					'merek_perangkat'  => $this->input->post('merek_perangkat'),
					'mac_address'  => $this->input->post('macaddress'),
					'serial_number'  => $this->input->post('serial_number'),
					'nomor_1'  => $this->input->post('nomor_1'),
					'nomor_2'  => $this->input->post('nomor_2'),
					'imei1'  => $this->input->post('imei_1'),
					'imei2'  => $this->input->post('imei_2'),
					'inet'  => $this->input->post('nomor_inet'),
					'vendor'  => $this->input->post('vendor'),
					'kapasitas'  => $this->input->post('kapasitas'),
					'status'  => $this->input->post('status'),
					'dokumen'  => $this->input->post('dokumen'),
					'keterangan'  => $this->input->post('keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			}

			$cek = $this->model_datamidi->checkDuplicate($data, 'datamidi');
			if ($cek > 0) {
				echo json_encode(401);
			} else {
				$action = $this->model_datamidi->insert($data, 'datamidi');
				echo json_encode($action);
			}
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
