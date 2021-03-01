<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_wilayah');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mykepemilikanlistrik = $this->model_wilayah->viewOrdering('jenis_kepemilikan_perangkat', 'id', 'desc')->result_array();
			$myjenispembayaranlistrik = $this->model_wilayah->viewOrdering('jenis_pembayaran', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/wilayah/view',
				'ribbon'            => '<li class="active">Daftar Wilayah</li>',
				'page_name'         => 'Daftar Wilayah',
				'mykepemilikanlistrik' => $mykepemilikanlistrik,
				'myjenispembayaranlistrik' => $myjenispembayaranlistrik
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_wilayah->viewOrdering('wilayah', 'id', 'desc')->result_array();
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
			$config['upload_path'] = './assets/wilayah';
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
					'kode_wilayah'  => $this->input->post('e_kode'),
					'nama'  => $this->input->post('e_nama'),
					'alamat'  => $this->input->post('e_alamat'),
					'nomor_mou'  => $this->input->post('e_mou'),
					'titik_kordinat'  => $this->input->post('e_kordinat'),
					'pic_wilayah'  => $this->input->post('e_pic'),
					'jumlah_kk'  => $this->input->post('e_jumlahkepalakeluarga'),
					'nama_ketua_rw'  => $this->input->post('e_rw'),
					'telp_ketua_rw'  => $this->input->post('e_telprw'),
					'dokumen_mou' => $file_name,
					'jumlah_tiang_mandiri'  => $this->input->post('e_tiangmandiri'),
					'jumlah_tiang_non'  => $this->input->post('e_tiangnonmandiri'),
					'jumlah_odc'  => $this->input->post('e_odc'),
					'jumlah_odp'  => $this->input->post('e_odp'),
					'status_kepemilikan_listrik'  => $this->input->post('e_status_listrik'),
					'id_pelanggan_pln'  => $this->input->post('e_idpelangganpln'),
					'jenis_pembayaran_listrik'  => $this->input->post('e_jenis_pembayaran_listrik'),
					'keterangan'  => $this->input->post('e_keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			} else {
				$data = array(
					'kode_wilayah'  => $this->input->post('e_kode'),
					'nama'  => $this->input->post('e_nama'),
					'alamat'  => $this->input->post('e_alamat'),
					'nomor_mou'  => $this->input->post('e_mou'),
					'titik_kordinat'  => $this->input->post('e_kordinat'),
					'pic_wilayah'  => $this->input->post('e_pic'),
					'jumlah_kk'  => $this->input->post('e_jumlahkepalakeluarga'),
					'nama_ketua_rw'  => $this->input->post('e_rw'),
					'telp_ketua_rw'  => $this->input->post('e_telprw'),
					'jumlah_tiang_mandiri'  => $this->input->post('e_tiangmandiri'),
					'jumlah_tiang_non'  => $this->input->post('e_tiangnonmandiri'),
					'jumlah_odc'  => $this->input->post('e_odc'),
					'jumlah_odp'  => $this->input->post('e_odp'),
					'status_kepemilikan_listrik'  => $this->input->post('e_status_listrik'),
					'id_pelanggan_pln'  => $this->input->post('e_idpelangganpln'),
					'jenis_pembayaran_listrik'  => $this->input->post('e_jenis_pembayaran_listrik'),
					'keterangan'  => $this->input->post('e_keterangan'),
					'updatedAt' => date('Y-m-d H:i:s'),
					'updatedBy'	=> $this->session->userdata('name')
				);
			}
			$action = $this->model_wilayah->update($data_id, $data, 'wilayah');
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
			$my_data = $this->model_wilayah->viewWhere('wilayah', $data)->result();
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
			$action = $this->model_wilayah->delete($data_id, 'wilayah');
			echo json_encode($action);
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}


	public function simpan()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$config['upload_path'] = './assets/wilayah';
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
					'kode_wilayah'  => $this->input->post('kode'),
					'nama'  => $this->input->post('nama'),
					'alamat'  => $this->input->post('alamat'),
					'nomor_mou'  => $this->input->post('mou'),
					'titik_kordinat'  => $this->input->post('kordinat'),
					'pic_wilayah'  => $this->input->post('pic'),
					'jumlah_kk'  => $this->input->post('jumlahkepalakeluarga'),
					'nama_ketua_rw'  => $this->input->post('rw'),
					'telp_ketua_rw'  => $this->input->post('telprw'),
					'dokumen_mou' => $file_name,
					'jumlah_tiang_mandiri'  => $this->input->post('tiangmandiri'),
					'jumlah_tiang_non'  => $this->input->post('tiangnonmandiri'),
					'jumlah_odc'  => $this->input->post('odc'),
					'jumlah_odp'  => $this->input->post('odp'),
					'status_kepemilikan_listrik'  => $this->input->post('status_listrik'),
					'id_pelanggan_pln'  => $this->input->post('idpelangganpln'),
					'jenis_pembayaran_listrik'  => $this->input->post('jenis_pembayaran_listrik'),
					'keterangan'  => $this->input->post('keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			} else {
				$data = array(
					'kode_wilayah'  => $this->input->post('kode'),
					'nama'  => $this->input->post('nama'),
					'alamat'  => $this->input->post('alamat'),
					'nomor_mou'  => $this->input->post('mou'),
					'titik_kordinat'  => $this->input->post('kordinat'),
					'pic_wilayah'  => $this->input->post('pic'),
					'jumlah_kk'  => $this->input->post('jumlahkepalakeluarga'),
					'nama_ketua_rw'  => $this->input->post('rw'),
					'telp_ketua_rw'  => $this->input->post('telprw'),
					'jumlah_tiang_mandiri'  => $this->input->post('tiangmandiri'),
					'jumlah_tiang_non'  => $this->input->post('tiangnonmandiri'),
					'jumlah_odc'  => $this->input->post('odc'),
					'jumlah_odp'  => $this->input->post('odp'),
					'status_kepemilikan_listrik'  => $this->input->post('status_listrik'),
					'id_pelanggan_pln'  => $this->input->post('idpelangganpln'),
					'jenis_pembayaran_listrik'  => $this->input->post('jenis_pembayaran_listrik'),
					'keterangan'  => $this->input->post('keterangan'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			}

			$cek = $this->model_wilayah->checkDuplicate($data, 'wilayah');
			if ($cek > 0) {
				echo json_encode(401);
			} else {
				$action = $this->model_wilayah->insert($data, 'wilayah');
				echo json_encode($action);
			}
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
