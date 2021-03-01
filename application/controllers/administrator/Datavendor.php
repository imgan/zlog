<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datavendor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_datavendor');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$myvendor = $this->model_datavendor->viewOrdering('vendor', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/datavendor/view',
				'ribbon'            => '<li class="active">Daftar Vendor </li>',
				'page_name'         => 'Daftar Vendor ',
				'myvendor'			=> $myvendor
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_datavendor->viewOrdering('vendor_detail', 'id', 'desc')->result_array();
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
			$config['upload_path'] = './assets/vendor/npwp';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif|pdf';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("e_filenpwp");
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$data = array(
					'nama'  => $this->input->post('e_nama'),
					'alamat'  => $this->input->post('e_alamat'),
					'telp'  => $this->input->post('e_telp'),
					'jenis_layanan'  => $this->input->post('e_layanan'),
					'pic_vendor'  => $this->input->post('e_nmpic'),
					'telp_pic'  => $this->input->post('e_telppic'),
					'email'  => $this->input->post('e_emailpic'),
					'npwp'  => $this->input->post('e_npwp'),
					'file_npwp'  => $file_name,
					'website'  => $this->input->post('e_website'),
					'keterangan'  => $this->input->post('e_keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
				$action = $this->model_datavendor->update($data_id, $data, 'vendor_detail');
				echo json_encode($action);
			} else {
				$data = array(
					'nama'  => $this->input->post('e_nama'),
					'alamat'  => $this->input->post('e_alamat'),
					'telp'  => $this->input->post('e_telp'),
					'jenis_layanan'  => $this->input->post('e_layanan'),
					'pic_vendor'  => $this->input->post('e_nmpic'),
					'telp_pic'  => $this->input->post('e_telppic'),
					'email'  => $this->input->post('e_emailpic'),
					'npwp'  => $this->input->post('e_npwp'),
					'website'  => $this->input->post('e_website'),
					'keterangan'  => $this->input->post('e_keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
				$action = $this->model_datavendor->update($data_id, $data, 'vendor_detail');
				echo json_encode($action);
			}
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
			$my_data = $this->model_datavendor->viewWhere('vendor_detail', $data)->result();
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
			$action = $this->model_datavendor->delete($data_id, 'vendor_detail');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$config['upload_path'] = './assets/vendor/npwp';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif|pdf';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("filenpwp");
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$data = array(
					'nama'  => $this->input->post('nama'),
					'alamat'  => $this->input->post('alamat'),
					'telp'  => $this->input->post('telp'),
					'jenis_layanan'  => $this->input->post('layanan'),
					'pic_vendor'  => $this->input->post('nmpic'),
					'telp_pic'  => $this->input->post('telppic'),
					'email'  => $this->input->post('emailpic'),
					'npwp'  => $this->input->post('npwp'),
					'file_npwp'  => $file_name,
					'website'  => $this->input->post('website'),
					'keterangan'  => $this->input->post('keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
				$cek = $this->model_datavendor->checkDuplicate($data, 'vendor_detail');
				if ($cek > 0) {
					echo json_encode(401);
				} else {
					$action = $this->model_datavendor->insert($data, 'vendor_detail');
					echo json_encode($action);
				}
			} else {
				$data = array(
					'nama'  => $this->input->post('nama'),
					'alamat'  => $this->input->post('alamat'),
					'telp'  => $this->input->post('telp'),
					'jenis_layanan'  => $this->input->post('layanan'),
					'pic_vendor'  => $this->input->post('nmpic'),
					'telp_pic'  => $this->input->post('telppic'),
					'email'  => $this->input->post('emailpic'),
					'npwp'  => $this->input->post('npwp'),
					'website'  => $this->input->post('website'),
					'keterangan'  => $this->input->post('keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
				$cek = $this->model_datavendor->checkDuplicate($data, 'vendor_detail');
				if ($cek > 0) {
					echo json_encode(401);
				} else {
					$action = $this->model_datavendor->insert($data, 'vendor_detail');
					echo json_encode($action);
				}
			}
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
