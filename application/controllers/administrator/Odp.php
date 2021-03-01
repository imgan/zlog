<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Odp extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_odp');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mywilayah = $this->model_odp->viewOrdering('wilayah', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/odp/view',
				'ribbon'            => '<li class="active">Daftar odp</li>',
				'page_name'         => 'Daftar odp',
				'mywilayah'			=> $mywilayah
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_odp->viewOrdering('odp', 'id', 'desc')->result_array();
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
			$config['upload_path'] = './assets/odp';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif|pdf';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("e_dokumen");
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$data = array(
					'kode'  => $this->input->post('e_nama'),
					'wilayah'  => $this->input->post('e_wilayah'),
					'nomor_tiang'  => $this->input->post('e_nomor_tiang'),
					'titik_kordinat' => $this->input->post('e_kordinat'),
					'jumlah_port' => $this->input->post('e_jumlah_port'),
					'dokumen' 		=> $file_name,
					'keterangan'  => $this->input->post('e_Keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			} else {
				$data = array(
					'kode'  => $this->input->post('e_nama'),
					'wilayah'  => $this->input->post('e_wilayah'),
					'nomor_tiang'  => $this->input->post('e_nomor_tiang'),
					'titik_kordinat' => $this->input->post('e_kordinat'),
					'jumlah_port' => $this->input->post('e_jumlah_port'),
					'keterangan'  => $this->input->post('e_Keterangan'),
					'updatedAt' => date('Y-m-d H:i:s'),
					'updatedBy'	=> $this->session->userdata('name')
				);
			}
			$action = $this->model_odp->update($data_id, $data, 'odp');
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
			$my_data = $this->model_odp->viewWhere('odp', $data)->result();
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
			$action = $this->model_odp->delete($data_id, 'odp');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$config['upload_path'] = './assets/odp';
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
					'kode'  => $this->input->post('nama'),
					'wilayah'  => $this->input->post('wilayah'),
					'nomor_tiang'  => $this->input->post('nomor_tiang'),
					'titik_kordinat' => $this->input->post('kordinat'),
					'jumlah_port' => $this->input->post('jumlah_port'),
					'dokumen' 		=> $file_name,
					'keterangan'  => $this->input->post('Keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
				$cek = $this->model_odp->checkDuplicate($data, 'odp');
				if ($cek > 0) {
					echo json_encode(401);
				} else {
					$action = $this->model_odp->insert($data, 'odp');
					echo json_encode($action);
				}
			} else {
				$data = array(
					'kode'  => $this->input->post('nama'),
					'wilayah'  => $this->input->post('wilayah'),
					'nomor_tiang'  => $this->input->post('nomor_tiang'),
					'titik_kordinat' => $this->input->post('kordinat'),
					'jumlah_port' => $this->input->post('jumlah_port'),
					'keterangan'  => $this->input->post('Keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
				$cek = $this->model_odp->checkDuplicate($data, 'odp');
				if ($cek > 0) {
					echo json_encode(401);
				} else {
					$action = $this->model_odp->insert($data, 'odp');
					echo json_encode($action);
				}
			}
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
