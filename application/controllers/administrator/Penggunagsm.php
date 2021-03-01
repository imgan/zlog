<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggunagsm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_penggunagsm');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$myoperator = $this->model_penggunagsm->viewOrdering('operator', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/penggunagsm/view',
				'ribbon'            => '<li class="active">Daftar Pengguna GSM</li>',
				'page_name'         => 'Daftar Pengguna GSM',
				'myoperator'		=> $myoperator
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_penggunagsm->viewOrderingCustomV2('pengguna_gsm', 'id', 'desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function showquota()
	{
		$operator = $this->input->post('id');
		$result = $this->model_penggunagsm->viewWhereCustom($operator)->result_array();
		echo "<option value='0'>--Pilih Data --</option>";
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['besar_quota'] . "] </option>";
		}
	}
	
	public function showquotaedit()
	{
		$operator = $this->input->post('id');
		$result = $this->model_penggunagsm->viewWhereCustomV2($operator)->result_array();
		echo "<option value='0'>--Pilih Data --</option>";
		foreach ($result as $value) {
			echo "<option value='" . $value['id'] . "'> [" . $value['besar_quota'] . "] </option>";
		}
	}

	public function update()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$data_id = array(
				'id'  => $this->input->post('e_id')
			);
			$data = array(
				'operator'  => $this->input->post('e_operator'),
				'nomor_msisdn'  => $this->input->post('e_nomor_msisdn'),
				'besar_quota'  => $this->input->post('e_quota'),
				'alokasi'  => $this->input->post('e_alokasi'),
				'nomor_iccid'  => $this->input->post('e_nomor_iccid'),
				'status'  => $this->input->post('e_status'),
				'keterangan'  => $this->input->post('e_keterangan'),
				'updatedAt' => date('Y-m-d H:i:s'),
				'updatedBy' => $this->session->userdata('name'),
			);
			$action = $this->model_penggunagsm->update($data_id, $data, 'pengguna_gsm');
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
			$my_data = $this->model_penggunagsm->viewWhere('pengguna_gsm', $data)->result();
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
			$action = $this->model_penggunagsm->delete($data_id, 'pengguna_gsm');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

			$data = array(
				'operator'  => $this->input->post('operator'),
				'nomor_msisdn'  => $this->input->post('nomor_msisdn'),
				'besar_quota'  => $this->input->post('quota'),
				'alokasi'  => $this->input->post('alokasi'),
				'nomor_iccid'  => $this->input->post('nomor_iccid'),
				'status'  => $this->input->post('status'),
				'keterangan'  => $this->input->post('keterangan'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
			);
			$action = $this->model_penggunagsm->insert($data, 'pengguna_gsm');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
