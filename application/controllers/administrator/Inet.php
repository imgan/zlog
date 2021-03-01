<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inet extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_inet');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$myoperator = $this->model_inet->viewOrdering('operator', 'id', 'desc')->result_array();
			$data = array(
				'page_content'      => '../pageadmin/inet/view',
				'ribbon'            => '<li class="active">Daftar Pengguna INET</li>',
				'page_name'         => 'Daftar Pengguna INET',
				'myoperator'			=> $myoperator
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {
			$my_data = $this->model_inet->viewOrderingCustom('inet', 'id', 'desc')->result_array();
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
				'nomor_pstn'  => $this->input->post('e_nomor_pstn'),
				'nomor_inet'  => $this->input->post('e_nomor_inet'),
				'password_inet'  => $this->input->post('e_password_inet'),
				'kapasitas'  => $this->input->post('e_kapasitas'),
				'alokasi'  => $this->input->post('e_alokasi'),
				'status'  => $this->input->post('e_status'),
				'keterangan'  => $this->input->post('e_keterangan'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
            );
			$action = $this->model_inet->update($data_id, $data, 'inet');
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
			$my_data = $this->model_inet->viewWhere('inet', $data)->result();
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
            $action = $this->model_inet->delete($data_id, 'inet');
            echo json_encode($action);
        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }


    public function simpan()
    {
        if ($this->session->userdata('email') != null && $this->session->userdata('name') != null) {

            $data = array(
                'nama'  => $this->input->post('nama'),
				'nomor_pstn'  => $this->input->post('nomor_pstn'),
				'nomor_inet'  => $this->input->post('nomor_inet'),
				'password_inet'  => $this->input->post('password_inet'),
				'kapasitas'  => $this->input->post('kapasitas'),
				'alokasi'  => $this->input->post('alokasi'),
				'status'  => $this->input->post('status'),
				'keterangan'  => $this->input->post('keterangan'),
				'createdAt' => date('Y-m-d H:i:s'),
				'createdBy'	=> $this->session->userdata('name')
            );
			$cek = $this->model_inet->checkDuplicate($data,'inet');
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_inet->insert($data, 'inet');
				echo json_encode($action);
			}

        } else {
            $this->load->view('pageadmin/login'); //Memanggil function render_view
        }
    }
}
