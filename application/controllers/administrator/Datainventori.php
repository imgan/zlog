<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datainventori extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_datainventori');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$mykategori = $this->model_datainventori->viewOrdering('kategori_inventori', 'id', 'desc')->result_array();
			$mystatuskepemilikan = $this->model_datainventori->viewOrdering('jenis_kepemilikan_perangkat', 'id', 'desc')->result_array();
			$mymerek = $this->model_datainventori->viewOrdering('merek_perangkat', 'id', 'desc')->result_array();
			
			$data = array(
				'page_content'      => '../pageadmin/datainventori/view',
				'ribbon'            => '<li class="active">Daftar Inventori</li>',
				'page_name'         => 'Daftar Inventori',
				'mykategori'		=> $mykategori,
				'mystatuskepemilikan'		=> $mystatuskepemilikan,
				'mymerek'			=> $mymerek
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_datainventori->viewOrdering('data_inventori', 'id', 'desc')->result_array();
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
			$config['upload_path'] = './assets/inventori';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif|pdf';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("e_foto");
			if($do_upload){
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$data = array(
					'nama'  => $this->input->post('e_nama'),
					'nomor'  => $this->input->post('e_nomor'),
					'label'  => $this->input->post('e_label'),
					'kategori'  => $this->input->post('e_kategori'),
					'tgl_pembelian'  => $this->input->post('e_tgl_pembelian'),
					'fungsi'  => $this->input->post('e_fungsi'),
					'ukuran'  => $this->input->post('e_ukuran'),
					'merek'  => $this->input->post('e_merek'),
					'type'  => $this->input->post('e_type'),
					'status_kepemilikan'  => $this->input->post('e_statuskepemilikan'),
					'serial_number'  => $this->input->post('e_serialnumber'),
					'mac_address'  => $this->input->post('e_macaddress'),
					'alokasi'  => $this->input->post('e_alokasi'),
					'keterangan'  => $this->input->post('e_keterangan'),
					'foto' => $file_name,
					'penanggung_jawab'  => $this->input->post('e_penanggungjawab'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			} else {
				$data = array(
					'nama'  => $this->input->post('e_nama'),
					'nomor'  => $this->input->post('e_nomor'),
					'label'  => $this->input->post('e_label'),
					'kategori'  => $this->input->post('e_kategori'),
					'tgl_pembelian'  => $this->input->post('e_tgl_pembelian'),
					'fungsi'  => $this->input->post('e_fungsi'),
					'ukuran'  => $this->input->post('e_ukuran'),
					'merek'  => $this->input->post('e_merek'),
					'type'  => $this->input->post('e_type'),
					'keterangan'  => $this->input->post('e_keterangan'),
					'status_kepemilikan'  => $this->input->post('e_statuskepemilikan'),
					'serial_number'  => $this->input->post('e_serialnumber'),
					'mac_address'  => $this->input->post('e_macaddress'),
					'alokasi'  => $this->input->post('e_alokasi'),
					'penanggung_jawab'  => $this->input->post('e_penanggungjawab'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			}
		
			$action = $this->model_datainventori->update($data_id, $data, 'data_inventori');
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
			$my_data = $this->model_datainventori->viewWhere('data_inventori', $data)->result();
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
            $action = $this->model_datainventori->delete($data_id, 'data_inventori');
            echo json_encode($action);
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }


    public function simpan()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$config['upload_path'] = './assets/inventori';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif|pdf';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("foto");
			if($do_upload){
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$data = array(
					'nama'  => $this->input->post('nama'),
					'nomor'  => $this->input->post('nomor'),
					'label'  => $this->input->post('label'),
					'kategori'  => $this->input->post('kategori'),
					'tgl_pembelian'  => $this->input->post('tglpembelian'),
					'fungsi'  => $this->input->post('fungsi'),
					'ukuran'  => $this->input->post('ukuran'),
					'merek'  => $this->input->post('merek'),
					'type'  => $this->input->post('type'),
					'status_kepemilikan'  => $this->input->post('statuskepemilikan'),
					'serial_number'  => $this->input->post('serialnumber'),
					'mac_address'  => $this->input->post('macaddress'),
					'alokasi'  => $this->input->post('alokasi'),
					'keterangan'  => $this->input->post('keterangan'),
					'penanggung_jawab'  => $this->input->post('penanggungjawab'),
					'foto' => $file_name,
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			} else {
				$data = array(
					'nama'  => $this->input->post('nama'),
					'nomor'  => $this->input->post('nomor'),
					'label'  => $this->input->post('label'),
					'kategori'  => $this->input->post('kategori'),
					'tgl_pembelian'  => $this->input->post('tgl_pembelian'),
					'fungsi'  => $this->input->post('fungsi'),
					'ukuran'  => $this->input->post('ukuran'),
					'merek'  => $this->input->post('merek'),
					'type'  => $this->input->post('type'),
					'status_kepemilikan'  => $this->input->post('statuskepemilikan'),
					'serial_number'  => $this->input->post('serialnumber'),
					'mac_address'  => $this->input->post('macaddress'),
					'alokasi'  => $this->input->post('alokasi'),
					'penanggung_jawab'  => $this->input->post('penanggungjawab'),
					'createdAt' => date('Y-m-d H:i:s'),
					'createdBy'	=> $this->session->userdata('name')
				);
			}
          
			$cek = $this->model_datainventori->checkDuplicate($data,'data_inventori');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_datainventori->insert($data, 'data_inventori');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
